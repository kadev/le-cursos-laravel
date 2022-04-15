
<div class="border-top-tab">
    <ul class="nav nav-tabs mb-3 mt-3 justify-content-center" id="borderTop" role="tablist">
        @if($this->activity == 'update')
            <li class="nav-item">
                <a class="block-segment nav-link {{ ($this->tab == 'content') ? 'active':'' }}" wire:click.prevent="changeTab('content')" id="content-course-tab" data-toggle="tab" href="#content-course" role="tab" aria-controls="border-top-home" aria-selected="true">
                    <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>                    Contenido
                </a>
            </li>
        @endif
        <li class="nav-item">
            <a class="block-segment nav-link {{ ($this->tab == 'general') ? 'active':'' }}" wire:click.prevent="changeTab('general')" id="general-course-info-tab" data-toggle="tab" href="#general-course-info" role="tab" aria-controls="border-top-home" aria-selected="true">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                General
            </a>
        </li>
        <li class="nav-item d-none">
            <a class="block-segment nav-link {{ ($this->tab == 'requirements') ? 'active':'' }}" wire:click.prevent="changeTab('requirements')" id="course-requirements-tab" data-toggle="tab" href="#course-requirements" role="tab" aria-controls="border-top-profile" aria-selected="false">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                Requerimientos
            </a>
        </li>
        <li class="nav-item d-none">
            <a class="block-segment nav-link {{ ($this->tab == 'outcomes') ? 'active':'' }}" wire:click.prevent="changeTab('outcomes')" id="course-outcomes-tab" data-toggle="tab" href="#course-outcomes" role="tab" aria-controls="border-top-contact" aria-selected="false">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                Resultados
            </a>
        </li>
        <li class="nav-item">
            <a class="block-segment nav-link {{ ($this->tab == 'price') ? 'active':'' }}" wire:click.prevent="changeTab('price')" id="course-prices-tab" data-toggle="tab" href="#course-prices" role="tab" aria-controls="border-top-setting" aria-selected="false">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                Precio
            </a>
        </li>
        <li class="nav-item">
            <a class="block-segment nav-link {{ ($this->tab == 'media') ? 'active':'' }}" wire:click.prevent="changeTab('media')" id="course-media-tab" data-toggle="tab" href="#course-media" role="tab" aria-controls="border-top-setting" aria-selected="false">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><polygon points="10 8 16 12 10 16 10 8"></polygon></svg>
                Media
            </a>
        </li>
        <li class="nav-item">
            <a class="block-segment nav-link {{ ($this->tab == 'seo') ? 'active':'' }}" wire:click.prevent="changeTab('seo')" id="course-seo-tab" data-toggle="tab" href="#course-seo" role="tab" aria-controls="border-top-setting" aria-selected="false">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>
                SEO
            </a>
        </li>
        <li class="nav-item">
            <a class="block-segment nav-link {{ ($this->tab == 'finish') ? 'active':'' }}" wire:click.prevent="changeTab('finish')" id="course-finish-tab" data-toggle="tab" href="#course-finish" role="tab" aria-controls="border-top-setting" aria-selected="false">
                <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                Finalizar
            </a>
        </li>
    </ul>
    <div class="tab-content col-md-8 offset-md-2" id="borderTopContent">
        @if($this->activity == 'update')
            <div class="tab-pane fade {{ ($this->tab == 'content') ? 'active show':'' }}" id="course-content" role="tabpanel" aria-labelledby="course-content">
                <h4 class="mb-4">Contenido del curso</h4>

                <div class="d-flex flex-row justify-content-end">
                    <button class="btn btn-outline-primary mb-2 mr-2" wire:click="$emit('createModule')">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Modulo
                    </button>
                    <button class="btn btn-outline-primary mb-2 mr-2" wire:click="$emit('createUnit')">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Unidad
                    </button>
                    <button class="btn btn-outline-primary mb-2 mr-2" wire:click="$emit('createClass')">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                        Clase
                    </button>
                    <button class="btn btn-outline-primary mb-2 mr-2 d-none">
                        <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                        Organizar
                    </button>
                </div>

                @forelse ($this->content as $module)
                    <div class="jumbotron pt-3 pb-3" style="background-color: #e3eaef;">
                        <div class="d-flex flex-row justify-content-end">
                            <h4 class="mb-1 mt-2">{{ $module->title }}</h4>
                            <div class="ml-auto">
                                <div class="dropdown dropup custom-dropdown">
                                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1" style="will-change: transform;">
                                        <a class="dropdown-item" wire:click="$emit('editModule',{{ $module->id }})" href="javascript:void(0);">Editar</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Organizar</a>
                                        <a class="dropdown-item"  wire:click="$emit('triggerDeleteModule',{{ $module->id }})" href="javascript:void(0);">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @forelse ($module->units as $unit)
                            <div class="jumbotron pt-3 mt-2 pb-3 mb-2" style="background-color: #fafbfe">
                                <div class="d-flex flex-row justify-content-end">
                                    <h4 class="mb-1 mt-2">{{ $unit->title }}</h4>

                                    <div class="ml-auto">
                                        <div class="dropdown dropup custom-dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg style="color: white;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1" style="will-change: transform;">
                                                <a class="dropdown-item" wire:click="$emit('editUnit',{{ $unit->id }})" href="javascript:void(0);">Editar</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Organizar</a>
                                                <a class="dropdown-item" wire:click="$emit('triggerDeleteUnit',{{ $unit->id }})" href="javascript:void(0);">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @forelse ($unit->classes as $class)
                                    <div class="card component-card_8 mb-2 mt-2 class-container">
                                        <div class="card-body">
                                            <div class="progress-order">
                                                <div class="progress-order-header">
                                                    <div class="row">
                                                        <div class="col-md-10 col-sm-6 col-12">
                                                            <h6 class="mb-0 class-title d-flex" style="font-size: 14px;">
                                                                <img class="align-self-center mr-2" width="24px" height="24px" src="{{ asset("assets/img") }}/{{ (!empty($class->type) ? $class->type:'unknown-type') }}.png">
                                                                <span class="flex-grow-1">{{ $class->title }}</span>
                                                            </h6>
                                                        </div>
                                                        <div class="col-md-2 pl-0 col-sm-6 col-12 text-right">
                                                            <a class="class-options" href="{{ route('config-class', [$class->id]) }}"><svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg></a>
                                                            <span class="class-options" wire:click="$emit('triggerDeleteClass',{{ $class->id }})"><svg viewBox="0 0 24 24" width="16" height="16" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if($class->type == "live")
                                            <div class="card-footer" style="padding: .25rem.75rem; border: none; background-color: #66b3ff; color: white; text-align: right; font-weight: 500; font-size: 12px;">
                                                @if(!empty($class->url))
                                                    <svg style="width: 15px;margin-top: 2px; float: left;" title="Información completa." aria-hidden="true" focusable="false" data-prefix="far" data-icon="check-circle" class="svg-inline--fa fa-check-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119.033 8 8 119.033 8 256s111.033 248 248 248 248-111.033 248-248S392.967 8 256 8zm0 48c110.532 0 200 89.451 200 200 0 110.532-89.451 200-200 200-110.532 0-200-89.451-200-200 0-110.532 89.451-200 200-200m140.204 130.267l-22.536-22.718c-4.667-4.705-12.265-4.736-16.97-.068L215.346 303.697l-59.792-60.277c-4.667-4.705-12.265-4.736-16.97-.069l-22.719 22.536c-4.705 4.667-4.736 12.265-.068 16.971l90.781 91.516c4.667 4.705 12.265 4.736 16.97.068l172.589-171.204c4.704-4.668 4.734-12.266.067-16.971z"/></svg>
                                                @endif
                                                {{ date("d-m-Y \a \l\a\s H:i", strtotime($class->live_datetime)) }}
                                            </div>
                                        @endif
                                    </div>
                                @empty
                                    <p>No se encontraron clases</p>
                                @endforelse
                            </div>
                        @empty
                            <p>No se encontraron unidades</p>
                        @endforelse
                    </div>
                @empty
                    <div class="jumbotron pt-3 mt-2 pb-3 mb-2" style="background-color: #fafbfe">
                        <h4 class="mb-1 mt-2 text-center">No se encontraron modulos</h4>
                    </div>
                @endforelse
            </div>
        @endif
        <div class="tab-pane fade {{ ($this->tab == 'general') ? 'active show':'' }}" id="general-course-info" role="tabpanel" aria-labelledby="general-course-info">
            <h4 class="mb-4">Información general</h4>
            <form>
                <div class="form-group row mb-4">
                    <label for="course-title" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Título <span style="color: darkred;">*</span></label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input type="text" wire:model="title" wire:keyup="generateKeyname" class="form-control" id="course-title" placeholder="">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="course-title" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Clave <span style="color: darkred;">*</span></label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input type="text" wire:model="key_name" class="form-control" id="key-name">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="course-short-description" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Resumen</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <textarea rows="2" type="text" class="form-control" id="course-short-description" wire:model="short_description"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="course-description" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Descripción</label>
                    <div wire:ignore="" class="col-xl-10 col-lg-9 col-sm-10">
                        <textarea rows="2" type="text" class="form-control" id="course-description"></textarea>
                    </div>

                    <textarea wire:model="description" name="description" class="form-control d-none"></textarea>
                </div>
                <div class="form-group row mb-4" wire:ignore="">
                    <label for="page_main_color" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Color principal</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10" wire:ignore="">
                        <input id='colorpicker' type="text" class="form-control" wire:ignore="">
                    </div>
                    <input wire:model="page_main_color" name="page-main-color" type="text" class="form-control d-none">
                </div>
                <div class="form-group row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9">
                        <div class="form-check pl-0">

                            <div class="custom-control custom-checkbox checkbox-info">
                                <input type="checkbox" class="custom-control-input" id="course-top-course" wire:model="featured">
                                <label class="custom-control-label" for="course-top-course">Curso Destacado</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <!-- <span class="btn btn-primary mt-3">Siguiente</span>-->
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade {{ ($this->tab == 'requirements') ? 'active show':'' }}" id="course-requirements" role="tabpanel" aria-labelledby="course-requirements">
            <h4 class="mb-4">Requerimientos del curso</h4>

            <div class="alert alert-light-warning mb-4" role="alert">
                <strong>¡Sección no disponible!</strong>
            </div>
        </div>
        <div class="tab-pane fade {{ ($this->tab == 'outcomes') ? 'active show':'' }}" id="course-outcomes" role="tabpanel" aria-labelledby="course-outcomes">
            <h4 class="mb-4">Resultados esperados del curso</h4>

            <div class="alert alert-light-warning mb-4" role="alert">
                <strong>¡Sección no disponible!</strong>
            </div>
        </div>
        <div class="tab-pane fade {{ ($this->tab == 'price') ? 'active show':'' }}" id="course-prices" role="tabpanel" aria-labelledby="course-prices">
            <h4 class="mb-4">Precio del curso</h4>

            <form>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div class="form-check pl-0">

                            <div class="custom-control custom-checkbox checkbox-info">
                                <input type="checkbox" class="custom-control-input" id="course-is-free" wire:model="is_free">
                                <label class="custom-control-label" for="course-is-free">¿Este curso es gratuito?</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="course-price" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Precio</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <div class="input-group mb-5">
                            <input type="number" class="form-control" id="course-price"  wire:model="price" {{ ($this->is_free == 1) ? 'disabled':'' }}>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon6">USD</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <div class="form-check pl-0">

                            <div class="custom-control custom-checkbox checkbox-info">
                                <input type="checkbox" class="custom-control-input" id="course-has-a-discount" wire:model="has_a_discount">
                                <label class="custom-control-label" for="course-has-a-discount">¿Este curso tiene descuento?</label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="course-discount-price" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Precio con descuento</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <div class="input-group mb-5">
                            <input type="number" class="form-control" id="course-discount-price"  wire:model="discount_price" {{ ($this->has_a_discount == 0) ? 'disabled':'' }}>
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon6">USD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade {{ ($this->tab == 'media') ? 'active show':'' }}" id="course-media" role="tabpanel" aria-labelledby="course-media">
            <h4 class="mb-4">Media</h4>

            <form>
                <div class="form-group row mb-4">
                    <label for="course-overview-provider" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Proveedor del resumen</label>
                    <div wire:ignore="" class="col-xl-10 col-lg-9 col-sm-10">
                        <select class="form-control basic @error('overview_provider') is-invalid @enderror select2" name="overview-provider" data-model="overview_provider">
                            <option selected value="">Elige uno...</option>
                            <option value="youtube">Youtube</option>
                            <option value="vimeo">Vimeo</option>
                            <option value="html5">HTML5</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="course-overview-url" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Link del resumen</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <input type="text" class="form-control" id="course-overview-url" placeholder="Ejem. https://www.youtube.com/watch?v=oBtf8Yglw2w" wire:model="overview_url">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="course-thumbnail" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Thumbnail</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <div class="custom-file-container" data-upload-id="thumbnail-image">
                            <label  wire:ignore="" >Subir archivo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file"  wire:model="thumbnail" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                <input type="hidden" name="MAX_FILE_SIZE" value="5000" />
                                <span wire:ignore="" class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div wire:ignore="" class="custom-file-container__image-preview" style="margin-top: 25px !important;" id="thumbnail-preview"></div>
                        </div>
                        <span wire:loading wire:target="thumbnail" class="btn btn-outline-primary w-100" style="pointer-events: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                            Subiendo archivo
                        </span>
                        @error('thumbnail')
                            <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="course-cover" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Portada</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <div class="custom-file-container" data-upload-id="cover-image">
                            <label  wire:ignore="" >Subir archivo <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                            <label class="custom-file-container__custom-file" >
                                <input type="file"  wire:model="page_cover" class="custom-file-container__custom-file__custom-file-input" accept="image/*">
                                <input type="hidden" name="MAX_FILE_SIZE" value="5000" />
                                <span wire:ignore="" class="custom-file-container__custom-file__custom-file-control"></span>
                            </label>
                            <div wire:ignore="" class="custom-file-container__image-preview" style="margin-top: 25px !important;" id="cover-preview"></div>
                        </div>
                        <span wire:loading wire:target="page_cover" class="btn btn-outline-primary w-100" style="pointer-events: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin mr-2"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>
                            Subiendo archivo
                        </span>
                        @error('page_cover')
                        <small class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade {{ ($this->tab == 'seo') ? 'active show':'' }}" id="course-seo" role="tabpanel" aria-labelledby="course-seo">
            <h4 class="mb-4">SEO</h4>

            <form autocomplete="off">
                <div class="form-group row mb-4">
                    <label for="course-meta-keywords" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Meta keywords</label>
                    <div wire:ignore="" class="col-xl-10 col-lg-9 col-sm-10">
                        <input type="text" class="form-control" data-role="tagsinput" value="" data-model="meta_keywords">
                    </div>
                    <input type="text" class="form-control d-none" id="course-meta-keywords" placeholder="" wire:model="meta_keywords" data-role="tagsinput" value="">
                </div>
                <div class="form-group row mb-4">
                    <label for="course-meta-description" class="col-xl-2 col-sm-3 col-sm-2 col-form-label">Meta description</label>
                    <div class="col-xl-10 col-lg-9 col-sm-10">
                        <textarea rows="6" type="text" class="form-control" id="course-meta-description" placeholder="" wire:model="meta_description"></textarea>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade {{ ($this->tab == 'finish') ? 'active show':'' }}" id="course-finish" role="tabpanel" aria-labelledby="course-finish">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h2 class="mt-0"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg></h2>
                        <h3 class="mt-0">Finalizar</h3>

                        <p class="w-75 mb-2 mx-auto">Presiona el botón "{{ ($activity == "update") ? 'Actualizar': 'Crear curso' }}" para guardar la información que has introducido, puedes darle una última revisión antes de guardar.</p>

                        <div class="mb-3 mt-3">
                            @if($activity == "update")
                                <button type="button" class="btn btn-primary text-center" wire:click.prevent="update">Actualizar</button>
                            @elseif($activity=="create")
                                <button type="button" class="btn btn-primary text-center" wire:click.prevent="store">Crear</button>
                            @endif
                        </div>

                        <div class="row">
                            @if ($errors->any())
                                <div class=" col-md-12 text-left alert alert-arrow-right alert-icon-right alert-light-danger mb-4"
                                     role="alert">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>
                                    <strong>Hemos detectado los siguientes errores:</strong> <br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>
</div>

    <style>
        .ck-editor__editable {
            min-height: 200px !important;
        }
    </style>

@push('custom-scripts')
    <script>
        window.addEventListener('show-snackbar',function(e){
            Snackbar.show(e.detail);
        });

        $(".select2").select2();
        $('.select2').on('change', function (e) {
            var data = $(this).select2("val");
            var model = $(this).attr("data-model");
            @this.set(model, data);
        });

        $('input[data-role=tagsinput]').on("change", function(){
            var data = $(this).val();
            var model = $(this).attr("data-model");
            @this.set('meta_keywords', data);
        });

        $(".block-segment").on("click", function(){
            var block = $('.border-top-tab');
            $(block).block({
                message: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>',
                overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 0,
                    backgroundColor: 'transparent'
                }
            });
        });

        var thumbnailUpload = new FileUploadWithPreview('thumbnail-image');
        var thumbnailPreview = $("#thumbnail-preview");
        @if(!empty($this->thumbnail))
            thumbnailPreview.css("background-image", "url({{ asset('storage/'.$this->thumbnail) }})");
        @endif

        var thumbnailUpload = new FileUploadWithPreview('cover-image');
        var thumbnailPreview = $("#cover-preview");
        @if(!empty($this->page_cover))
            thumbnailPreview.css("background-image", "url({{ asset('storage/'.$this->page_cover) }})");
        @endif

        var ckeDescription = ClassicEditor
            .create( document.querySelector( '#course-description' ), {

            } )
            .then( editor => {
                editor.setData( $("textarea[name=description]").val() );
                editor.model.document.on( 'change:data', ( evt, data ) => {
                @this.set('description', editor.getData());
                } );

            } )
            .catch( error => {
                console.error( error );
            } );

        document.addEventListener('livewire:load', function () {
            @this.on('triggerDeleteModule', (moduleId) => {
                Swal.fire({
                    title: '¿Estás seguro de querer eliminar este modulo?',
                    text: 'Confirma la acción para continuar...',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    if (result.value) {
                        Livewire.emit('deleteModule', moduleId);
                    }
                });
            })

            @this.on('triggerDeleteUnit', (unitId) => {
                Swal.fire({
                    title: '¿Estás seguro de querer eliminar esta unidad?',
                    text: 'Confirma la acción para continuar...',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    if (result.value) {
                        Livewire.emit('deleteUnit', unitId);
                    }
                });
            })

            @this.on('triggerDeleteClass', (classId) => {
                Swal.fire({
                    title: '¿Estás seguro de querer eliminar esta clase?',
                    text: 'Confirma la acción para continuar...',
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonText: 'Eliminar'
                }).then((result) => {
                    if (result.value) {
                        Livewire.emit('deleteClass', classId);
                    }
                });
            })
        });

        $("#colorpicker").spectrum({
            color: "{{ $page_main_color }}",
            change: function(color) {
                $(".sp-colorize").css("background-color", color);
                @this.set('page_main_color', color.toHexString());
            }
        });


        window.addEventListener('create-success-alert', function(e){
            Swal.fire({
                type: "success",
                title: 'Curso creado con éxito',
                text: 'Se ha creado de forma correcta el nuevo curso.',
                showCancelButton: true,
                confirmButtonText: 'Administrar cursos',
                cancelButtonText: 'Crear otro'
            }).then((result) => {
                if (result.value) {
                    window.location.href = "{{ route('courses') }}"
                }else{
                    location.reload();
                }
            });
        });
    </script>
@endpush
