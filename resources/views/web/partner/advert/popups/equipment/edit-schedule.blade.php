<div class="edit-schedule-{{$iterator}} popup popup-form editdetails partnerdetails popup-form-xl">
	@if (Auth::user()->type == 'admin')
		<form class="login" action="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/cp/adverts/'.$advert->id.'/edit-schedule')}}" method="POST" enctype="multipart/form-data">
	@else
		<form class="login" action="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/adverts/'.$advert->id.'/edit-schedule')}}" method="POST">
	@endif
	
		@csrf
		<div class="close"></div>
		<div class="form">
			<h3>{{__('partner.edit_schedule')}}</h3>
			@if (Auth::user()->type == 'admin')
				<input type="text" name="id_partner" value="{{$user->id_partner}}" hidden />
			@else
				<input type="text" name="id_partner" value="{{Auth::user()->id_partner}}" hidden />
			@endif

			<label>{{__('partner.working_days')}}<span>*</span></label>
			@foreach(['mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'] as $day)
				<span class="checkbox-item">
					<input type="checkbox" name="working_days[]" value="{{$day}}" @if(strpos($advert->service->working_days, $day) != false) checked @endif>
					<span>{{__('days.'.$day)}}</span>
				</span>
			@endforeach


			<label class="mt-10">{{__('partner.opening_time')}}<span>*</span></label>
			<div class="row">
				<div class="col-sm-6">
				<input type="text" name="open" class="time" value="{{$advert->service->opening}}" required />
				</div>
				<div class="col-sm-6">
					<input type="text" name="close" class="time" value="{{$advert->service->closing}}" required />
				</div>
			</div>


			<label class="mt-10">{{__('partner.annual_holidays')}}</label>
			<input name="holidays" maxlength="350" value="{{$advert->service->holidays}}">


			<label class="mt-10">{{__('partner.possibility_extend_time')}}<span>*</span></label>
			<span class="radio-item">
				<input type="radio" name="extansion" class="has-field" field="extansion" value="yes" @if($advert->service->extansion == 'yes') checked @endif required>
				<span>{{__('partner.yes')}}</span>
			</span>
			<span class="radio-item">
				<input type="radio" name="extansion" class="has-field" field="extansion" value="no" @if($advert->service->extansion == 'no') checked @endif>
				<span>{{__('partner.no')}}</span>
			</span>
			@if($advert->service->extansion == 'yes')
				<div class="for-extansion additional-field visible">
					<input type="text" name="yes_extansion" maxlength="150" class="add-input-extansion" value="{{$advert->service->ext_true}}" required/>
				</div>
			@else
				<div class="for-extansion additional-field"></div>
			@endif
				

			<button type="submit" class="button">{{__('partner.save')}}</button>
		</div>
	</form>	
</div>
