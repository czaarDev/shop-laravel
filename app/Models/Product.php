<?php

namespace App\Models;

use App\Enums\StatusEmum;
use App\Traits\Auditable;
use App\Traits\HasSchemalessAttributes;
use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Staudenmeir\EloquentEagerLimit\HasEagerLimit;

class Product extends Model implements HasMedia
{

    use SoftDeletes;
    use InteractsWithMedia;
    use Auditable;
    use HasSlug;
    use HasFactory;
    use HasEagerLimit;
    use HasSchemalessAttributes;

    public $table = 'products';

    protected $appends = [
        'photo',
    ];

    protected $with = [
        'media',
    ];

    public static $searchable = [
        'name',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime',
    ];

    public const STATUS_RADIO = [
        'active'   => 'Ativo',
        'inactive' => 'Inativo',
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
        'content',
        'slug',
        'status',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')->fit('crop', 50, 50);
        $this->addMediaConversion('preview')->fit('crop', 120, 120);
    }

    public function getPhotoAttribute()
    {
        $files = $this->getMedia('photo');
        $files->each(function ($item) {
            $item->url = $item->getUrl();
            $item->thumbnail = $item->getUrl('thumb');
            $item->preview = $item->getUrl('preview');
        });

        return $files;
    }

    public function categories()
    {
        return $this->belongsToMany(ProductCategory::class);
    }

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = preg_replace('/\D/', '', $value);
        $this->attributes['price'] = number_format($this->attributes['price']/100, 2, '.', ' ');
        $this->attributes['price'] = str_replace(" ", "", $this->attributes['price']);
    }

    public function scopeActive()
    {
        return $this->where('status', StatusEmum::ACTIVE);
    }

    public function getBrazilianPriceAttribute(): string
    {
        return 'R$ ' . number_format($this->price, 2, ',', '.');
    }

}
