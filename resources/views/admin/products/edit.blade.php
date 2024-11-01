@extends('layouts.admin')

@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.edit') }} {{ trans('cruds.product.title_singular') }}
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route("admin.products.update", [$product->id]) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label class="required" for="name">{{ trans('cruds.product.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.name_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="description">{{ trans('cruds.product.fields.description') }}</label>
                    <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $product->description) }}</textarea>
                    @if($errors->has('description'))
                        <div class="invalid-feedback">
                            {{ $errors->first('description') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.description_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="categories">{{ trans('cruds.product.fields.category') }}</label>
                    <div style="padding-bottom: 4px">
                        <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                        <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                    </div>
                    <select class="form-control select2 {{ $errors->has('categories') ? 'is-invalid' : '' }}" name="categories[]" id="categories" multiple>
                        @foreach($categories as $id => $category)
                            <option value="{{ $id }}" {{ (in_array($id, old('categories', [])) || $product->categories->contains($id)) ? 'selected' : '' }}>{{ $category }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('categories'))
                        <div class="invalid-feedback">
                            {{ $errors->first('categories') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.category_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required" for="price">{{ trans('cruds.product.fields.price') }}</label>
                    <input class="form-control mask_money {{ $errors->has('price') ? 'is-invalid' : '' }}" type="text" name="price" id="price" value="{{ old('price', $product->price) }}" required>
                    @if($errors->has('price'))
                        <div class="invalid-feedback">
                            {{ $errors->first('price') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.price_helper') }}</span>
                </div>

                <div class="form-group">
                    <label class="required">{{ trans('cruds.product.fields.payment_methods') }}</label>
                    @foreach(\App\Enums\PaymentMethod::cases() as $item)
                        <div class="form-check {{ $errors->has('attributes[payment_methods]') ? 'is-invalid' : '' }}">
                            <input type="checkbox"
                                   class="form-check-input"
                                   id="payment_methods_{{ $item->value }}"
                                   name="attributes[payment_methods][]"
                                   value="{{ $item->value }}"
                                   @checked(old('attributes[payment_methods]', in_array($item->value, $product->attributes['payment_methods'] ?? [])))
                            />
                            <label class="form-check-label" for="payment_methods_{{ $item->value }}">{{ $item->name }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('attributes[payment_methods]'))
                        <div class="invalid-feedback">
                            {{ $errors->first('attributes[payment_methods]') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.payment_methods_helper') }}</span>
                </div>

                <div class="form-group div-maximum_number_of_installments">
                    <label class="required" for="attributes[maximum_number_of_installments]">{{ trans('cruds.product.fields.maximum_number_of_installments') }}</label>
                    <input type="text"
                           class="form-control {{ $errors->has('attributes[maximum_number_of_installments]') ? 'is-invalid' : '' }}"
                           name="attributes[maximum_number_of_installments]" id="attributes[maximum_number_of_installments]"
                           value="{{ old('attributes[maximum_number_of_installments]', $product->attributes['maximum_number_of_installments'] ?? 12) }}"
                           maxlength="2"
                           onkeyup="this.value = this.value.replace(/[^0-9]/, '')"
                    />
                    @if($errors->has('attributes[maximum_number_of_installments]'))
                        <div class="invalid-feedback">
                            {{ $errors->first('attributes[maximum_number_of_installments]') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.maximum_number_of_installments_helper') }}</span>
                </div>

                <fieldset class="border p-2 mb-3">
                    <legend  class="w-auto" style="font-size: 1rem;">
                        Pesos e medidas
                    </legend>

                    <div class="row">
                        <div class="col">
                            <label class="required" for="attributes[weight]">{{ trans('cruds.product.fields.weight') }}</label>
                            <input type="text"
                                   class="form-control mask_money {{ $errors->has('attributes[weight]') ? 'is-invalid' : '' }}"
                                   name="attributes[weight]" id="attributes[weight]"
                                   value="{{ old('attributes[weight]', $product->attributes['weight'] ?? '') }}"
                                   placeholder="peso em gramas"
                                   required
                            />
                            @if($errors->has('attributes[weight]'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attributes[weight]') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.weight_helper') }}</span>
                        </div>

                        <div class="col">
                            <label class="required" for="attributes[height]">{{ trans('cruds.product.fields.height') }}</label>
                            <input type="text"
                                   class="form-control mask_money {{ $errors->has('attributes[height]') ? 'is-invalid' : '' }}"
                                   name="attributes[height]" id="attributes[height]"
                                   value="{{ old('attributes[height]', $product->attributes['height'] ?? '') }}"
                                   placeholder="altura em centímetros"
                                   required
                            />
                            @if($errors->has('attributes[height]'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attributes[height]') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.height_helper') }}</span>
                        </div>

                        <div class="col">
                            <label class="required" for="attributes[length]">{{ trans('cruds.product.fields.length') }}</label>
                            <input type="text"
                                   class="form-control mask_money {{ $errors->has('attributes[length]') ? 'is-invalid' : '' }}"
                                   name="attributes[length]" id="attributes[width]"
                                   value="{{ old('attributes[length]', $product->attributes['length'] ?? '') }}"
                                   placeholder="comprimento em centímetros"
                                   required
                            />
                            @if($errors->has('attributes[length]'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attributes[length]') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.length_helper') }}</span>
                        </div>

                        <div class="col">
                            <label class="required" for="attributes[width]">{{ trans('cruds.product.fields.width') }}</label>
                            <input type="text"
                                   class="form-control mask_money {{ $errors->has('attributes[width]') ? 'is-invalid' : '' }}"
                                   name="attributes[width]" id="attributes[width]"
                                   value="{{ old('attributes[width]', $product->attributes['width'] ?? '') }}"
                                   placeholder="largura em centímetros"
                                   required
                            />
                            @if($errors->has('attributes[width]'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('attributes[width]') }}
                                </div>
                            @endif
                            <span class="help-block">{{ trans('cruds.product.fields.width_helper') }}</span>
                        </div>
                    </div>
                </fieldset>

                <div class="form-group">
                    <label for="content">{{ trans('cruds.product.fields.content') }}</label>
                    <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content', $product->content) !!}</textarea>
                    @if($errors->has('content'))
                        <div class="invalid-feedback">
                            {{ $errors->first('content') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.content_helper') }}</span>
                </div>

                <div class="form-group">
                    <label for="photo">{{ trans('cruds.product.fields.photo') }}</label>
                    <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                    </div>
                    @if($errors->has('photo'))
                        <div class="invalid-feedback">
                            {{ $errors->first('photo') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.photo_helper') }}</span>
                </div>

                <div class="form-group">
                    <label>{{ trans('cruds.product.fields.status') }}</label>
                    @foreach(App\Models\Product::STATUS_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $product->status) === (string) $key ? 'checked' : '' }}>
                            <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.product.fields.status_helper') }}</span>
                </div>

                <div class="form-group">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        var uploadedPhotoMap = {}
        Dropzone.options.photoDropzone = {
            url: '{{ route('admin.products.storeMedia') }}',
            maxFilesize: 5, // MB
            acceptedFiles: '.jpeg,.jpg,.png,.gif',
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            params: {
                size: 5,
                width: 4096,
                height: 4096
            },
            success: function (file, response) {
                $('form').append('<input type="hidden" name="photo[]" value="' + response.name + '">')
                uploadedPhotoMap[file.name] = response.name
            },
            removedfile: function (file) {
                console.log(file)
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedPhotoMap[file.name]
                }
                $('form').find('input[name="photo[]"][value="' + name + '"]').remove()
            },
            init: function () {
                @if(isset($product) && $product->photo)
                var files = {!! json_encode($product->photo) !!}
                for (var i in files) {
                    var file = files[i]
                    this.options.addedfile.call(this, file)
                    this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
                    file.previewElement.classList.add('dz-complete')
                    $('form').append('<input type="hidden" name="photo[]" value="' + file.file_name + '">')
                }
                @endif
            },
            error: function (file, response) {
                if ($.type(response) === 'string') {
                    var message = response //dropzone sends it's own error messages in string
                } else {
                    var message = response.errors.file
                }
                file.previewElement.classList.add('dz-error')
                _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
                _results = []
                for (_i = 0, _len = _ref.length; _i < _len; _i++) {
                    node = _ref[_i]
                    _results.push(node.textContent = message)
                }

                return _results
            }
        }

    </script>

    <script>
        $(document).ready(function () {
            function SimpleUploadAdapter(editor) {
                editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
                    return {
                        upload: function() {
                            return loader.file
                                .then(function (file) {
                                    return new Promise(function(resolve, reject) {
                                        // Init request
                                        var xhr = new XMLHttpRequest();
                                        xhr.open('POST', '{{ route('admin.posts.storeCKEditorImages') }}', true);
                                        xhr.setRequestHeader('x-csrf-token', window._token);
                                        xhr.setRequestHeader('Accept', 'application/json');
                                        xhr.responseType = 'json';

                                        // Init listeners
                                        var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                                        xhr.addEventListener('error', function() { reject(genericErrorText) });
                                        xhr.addEventListener('abort', function() { reject() });
                                        xhr.addEventListener('load', function() {
                                            var response = xhr.response;

                                            if (!response || xhr.status !== 201) {
                                                return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                                            }

                                            $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                                            resolve({ default: response.url });
                                        });

                                        if (xhr.upload) {
                                            xhr.upload.addEventListener('progress', function(e) {
                                                if (e.lengthComputable) {
                                                    loader.uploadTotal = e.total;
                                                    loader.uploaded = e.loaded;
                                                }
                                            });
                                        }

                                        // Send request
                                        var data = new FormData();
                                        data.append('upload', file);
                                        data.append('crud_id', '{{ $post->id ?? 0 }}');
                                        xhr.send(data);
                                    });
                                })
                        }
                    };
                }
            }

            var allEditors = document.querySelectorAll('.ckeditor');
            for (var i = 0; i < allEditors.length; ++i) {
                ClassicEditor.create(
                    allEditors[i], {
                        extraPlugins: [SimpleUploadAdapter]
                    }
                );
            }
        });
    </script>

    <script>
        $(document).on('change', "input[name='attributes[payment_methods][]']", function () {
            let val = $(this).val();
            const credit_card_method = '{{ \App\Enums\PaymentMethod::CREDIT_CARD }}';

            if ($("input[name='attributes[payment_methods][]']:checked").length === 0) {
                $(this).prop('checked', true);
                return;
            }

            if (val === credit_card_method) {
                $('.div-maximum_number_of_installments').toggleClass('d-none');
            }
        });
    </script>
@endsection
