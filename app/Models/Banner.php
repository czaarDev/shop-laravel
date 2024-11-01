<?php

namespace App\Models;

use App\Enums\TypeBannerEnum;
use Carbon\Carbon;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Banner extends Model implements HasMedia
{
    use SoftDeletes, InteractsWithMedia;

    public $table = 'banners';

    protected $appends = [
        'image',
    ];

    public static array $searchable = [
        'name',
    ];

    public const STATUS_RADIO = [
        'active'   => 'Ativo',
        'Inactive' => 'Inativo',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
        'start_at'   => 'datetime',
        'end_at'     => 'datetime',
    ];

    protected $fillable = [
        'name',
        'type',
        'link',
        'start_at',
        'end_at',
        'position',
        'status',
    ];

    protected static function booted(): void
    {
        static::created(function ($product) {
            cache()->forget('banners');
        });

        static::updating(function ($product) {
            cache()->forget('banners');
        });
    }

    protected function serializeDate(DateTimeInterface $date): string
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getImageAttribute()
    {
        $file = $this->getMedia('image')->last();
        if ($file) {
            $file->url       = $file->getUrl();
            $file->thumbnail = $file->getUrl('thumb');
            $file->preview   = $file->getUrl('preview');
        }

        return $file;
    }

    public function getStartAtAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setStartAtAttribute($value)
    {
        $this->attributes['start_at'] = $value
            ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d')
            : null;
    }

    public function getEndAtAttribute($value)
    {
        return $value
            ? Carbon::parse($value)->format(config('panel.date_format'))
            : null;
    }

    public function setEndAtAttribute($value)
    {
        $this->attributes['end_at'] = $value
            ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d')
            : null;
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where('start_at', '<=', now())
            ->where('end_at', '>=', now());
    }

    public function typeName(): Attribute
    {
        return Attribute::make(
            get: fn() => TypeBannerEnum::fromName($this->type),
        )->shouldCache();
    }

}
