<div class="row mt-0 mt-md-4 px-2 px-md-0">
    <div class="col-md-11 mx-auto">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 mt-md-0 mt-4 px-0">
                @if(count($course->modules) > 0)
                    <div id="toggleAccordion">
                        @foreach($course->modules as $module)
                            <div class="card" style="border: 1px solid #e0e6ed;">
                                <div class="card-header" id="">
                                    <section class="mb-0 mt-0">
                                        <div role="menu" class="{{ ($class != null AND $class->unit->module->id == $module->id) ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#module-{{ $module->id }}" aria-expanded="{{ ($class != null AND $class->unit->module->id == $module->id) ? 'false' : 'true' }}" aria-controls="module-{{ $module->id }}">
                                            {{ $module->title }}
                                            <div class="icons">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>                                                                    </div>
                                        </div>
                                    </section>
                                </div>

                                <div id="module-{{ $module->id }}" class="collapse {{ ($class != null AND $class->unit->module->id == $module->id) ? 'show' : '' }}" aria-labelledby="..." data-parent="#toggleAccordion">
                                    <div class="card-body">
                                        <div id="withoutSpacing" class="no-outer-spacing" style="border: 1px solid #e0e6ed;">
                                            @foreach($module->units as $unit)
                                                <div class="card">
                                                    <div class="card-header" id="headingOne2">
                                                        <section class="mb-0 mt-0">
                                                            <div role="menu" class="{{ ($class != null AND $class->unit->id == $unit->id) ? '' : 'collapsed' }}" data-toggle="collapse" data-target="#withoutSpacingAccordionOne" aria-expanded="{{ ($class != null AND $class->unit->id == $unit->id) ? 'false' : 'true' }}" aria-controls="withoutSpacingAccordionOne">
                                                                {{ $unit->title }}
                                                                <div class="icons">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>                                                                                        </div>
                                                            </div>
                                                        </section>
                                                    </div>

                                                    <div id="withoutSpacingAccordionOne" class="collapse {{ ($class != null AND $class->unit->id == $unit->id) ? 'show' : '' }}" aria-labelledby="headingOne2" data-parent="#withoutSpacing">
                                                        <div class="card-body pt-0">
                                                            <div class="list-group list-group-icons-meta">
                                                                @foreach($unit->classes as $item)
                                                                    <li class="px-3 list-group-item list-group-item-action {{ ($class != null AND $class->id == $item->id) ? 'active' : '' }}">
                                                                        <div class="media">
                                                                            <div class="d-flex mr-2 mt-1">
                                                                                @if($item->course_advance != null AND !empty($item->course_advance) AND $item->course_advance->status == 1)
                                                                                    <img class="align-self-center" width="16px" height="16px" src="{{ asset("assets/img") }}/checked.png">
                                                                                @else
                                                                                    <img class="align-self-center" width="16px" height="16px" src="{{ asset("assets/img") }}/{{ (!empty($item->type) ? $item->type:'unknown-type') }}.png">
                                                                                @endif
                                                                            </div>
                                                                            <div class="media-body">
                                                                                <a href="{{ route('see-course', [$course->key_name, $item->id]) }}">{{ $item->title }}</a>
                                                                            </div>
                                                                        </div>
                                                                    </li>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-light-warning mb-4" role="alert">
                        <strong>Curso sin contenido.</strong> Este curso no cuenta con contenido aún.
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
