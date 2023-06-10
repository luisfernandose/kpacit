<div id="newPriceModal" class="newPriceModal d-none">
    <div class="ticket-form" data-action="/panel/tickets/{{ !empty($ticket) ? $ticket->id . '/update' : 'store' }}">
        <input type="hidden" name="ajax[{{ !empty($ticket) ? $ticket->id : 'new' }}][webinar_id]"
            value="{{ !empty($webinar) ? $webinar->id : '' }}">

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="form-group">
                    <label class="input-label">{{ trans('public.title') }}</label>
                    <input type="text" name="ajax[{{ !empty($ticket) ? $ticket->id : 'new' }}][title]"
                        class="js-ajax-title form-control" value="{{ !empty($ticket) ? $ticket->title : '' }}"
                        placeholder="{{ trans('forms.maximum_64_characters') }}" />
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <div class="form-group">
                    <label class="input-label">{{ trans('public.discount') }} <span class="braces">(%)</span></label>
                    <input type="text" name="ajax[{{ !empty($ticket) ? $ticket->id : 'new' }}][discount]"
                        class="js-ajax-discount form-control" value="{{ !empty($ticket) ? $ticket->discount : '' }}" />
                    <div class="invalid-feedback"></div>
                </div>
            </div>

            <div class="col-12 col-lg-12">
                <div class="form-group">
                    <label class="input-label d-block">{{ trans('public.capacity') }}</label>
                    @if ($webinar->isWebinar() and empty($ticket) and !empty($webinar->capacity) and !empty($sumTicketsCapacities))
                        <span class="test-gray font-12 d-block">{{ trans('panel.remaining') }}: <span
                                class="js-ticket-remaining-capacity">{{ $webinar->capacity - $sumTicketsCapacities }}</span></span>
                    @endif

                    <input type="text" name="ajax[{{ !empty($ticket) ? $ticket->id : 'new' }}][capacity]"
                        class="js-ajax-capacity form-control mt-10"
                        value="{{ !empty($ticket) ? $ticket->capacity : '' }}"
                        placeholder="{{ $webinar->isWebinar() ? trans('webinars.empty_means_webinar_capacity') : trans('forms.empty_means_unlimited') }}" />
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="form-group">
                    <label class="input-label">{{ trans('public.start_date') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="dateRangeLabel">
                                <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                            </span>
                        </div>
                        <input type="date" name="ajax[{{ !empty($ticket) ? $ticket->id : 'new' }}][start_date]"
                            class="js-ajax-start_date form-control datepicker"
                            value="{{ !empty($ticket) ? dateTimeFormat($ticket->start_date, 'Y-m-d') : '' }}"
                            aria-describedby="dateRangeLabel" />
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-15 mt-lg-0">
                <div class="form-group">
                    <label class="input-label">{{ trans('webinars.end_date') }}</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="dateRangeLabel">
                                <i data-feather="calendar" width="18" height="18" class="text-white"></i>
                            </span>
                        </div>
                        <input type="date" name="ajax[{{ !empty($ticket) ? $ticket->id : 'new' }}][end_date]"
                            class="js-ajax-end_date form-control datepicker"
                            value="{{ !empty($ticket) ? dateTimeFormat($ticket->end_date, 'Y-m-d') : '' }}"
                            aria-describedby="dateRangeLabel" />
                        <div class="invalid-feedback"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-30 d-flex align-items-center">
            <button type="button" class="js-save-ticket btn btn-sm btn-primary">{{ trans('public.save') }}</button>

            <button type="button" class="close-swl btn btn-sm btn-danger ml-10">{{ trans('public.close') }}</button>

        </div>
    </div>
</div>
