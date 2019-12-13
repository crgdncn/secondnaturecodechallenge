                <div class="card-body">
                    <form method="POST" action="{!! $action_route !!}">
                        @csrf
                        @if(Request::segment(3) == 'edit')
                            @method('patch')
                        @endif
                        {{-- sku --}}
                        <div class="form-group row">
                            <label for="sku" class="col-md-4 col-form-label text-md-right">SKU</label>

                            <div class="col-md-6">
                                <input id="sku" class="form-control @error('sku') is-invalid @enderror" name="sku" value="{{ old('sku') ?? $sku ?? '' }}" required autofocus>

                                @error('sku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- name --}}
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $name ?? '' }}" required>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- description --}}
                        <div class="form-group row">
                            <label for="description" class="col-md-4 col-form-label text-md-right">Description</label>

                            <div class="col-md-6">
                                {{-- <input id="description" class="form-control @error('description') is-invalid @enderror" name="description"> --}}

                                <textarea  id="description" class="form-control @error('description') is-invalid @enderror" name="description" cols="50" rows="5">{{ old('description') ?? $description ?? '' }}
                                </textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{-- active --}}
                        <div class="form-group row">
                            <label for="active" class="col-md-4 col-form-label text-md-right">Active</label>

                            <div class="col-md-6">

                                <input id="active" type="checkbox" class="form-control @error('active') is-invalid @enderror" name="active" value="1" {{ ($active ?? false) ? 'checked' : ''}}>

                                @error('active')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                                <a href="{{route('widget.index')}}" class="btn btn-primary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
