<div class="edit-rates-{{$iterator}} popup popup-form editdetails partnerdetails popup-form-xl">
	@if (Auth::user()->type == 'admin')
		<form class="login" action="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/cp/adverts/'.$advert->id.'/edit-rates')}}" method="POST" enctype="multipart/form-data">
	@else
		<form class="login" action="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/adverts/'.$advert->id.'/edit-rates')}}" method="POST">
	@endif
	
		@csrf
		<div class="close"></div>
		<div class="form">
			<h3>{{__('partner.edit_rates_conditions')}}</h3>
			@if (Auth::user()->type == 'admin')
				<input type="text" name="id_partner" value="{{$user->id_partner}}" hidden />
			@else
				<input type="text" name="id_partner" value="{{Auth::user()->id_partner}}" hidden />
			@endif

			{{--<label>{{__('partner.price')}}<span>*</span></label>
			<div class="row">
				<div class="col-6">
					<input type="number" name="price" min="0" value="{{$user->partnerInfo->price}}" required />
				</div>
				<div class="col-6">
					<select name="price_for" required >
						<option @if($advert->service->price_for == 'space_rental_price_per_hour') selected @endif value="space_rental_price_per_hour">{{__('partner.space_rental_price_per_hour')}}</option>
						<option @if($advert->service->price_for == 'space_rental_price_per_day') selected @endif value="space_rental_price_per_day">{{__('partner.space_rental_price_per_day')}}</option>
						<option @if($advert->service->price_for == 'flat_rate_for_service') selected @endif value="flat_rate_for_service">{{__('partner.flat_rate_for_service')}}</option>
						<option @if($advert->service->price_for == 'other') selected @endif value="other" class="other-price">{{strtolower(__('become_partner.other'))}}</option>
					</select>
					@if($advert->service->price_for == 'other')
						<div class="for-price additional-field mt-10 visible">
							<input type="text" name="other_price" maxlength="35" class="add-input-price" value="{{$advert->service->other_price}}"/>
						</div>
					@else
						<div class="for-price additional-field mt-10"></div>
					@endif
				</div>
			</div>--}}
			
			<label class="mt-10">{{__('partner.budget')}}<span>*</span></label>
			<select name="budget" required >
				@foreach(\App\Helpers\BudgetsHelper::$_budgets as $k => $v)
					<option @if($user->partnerInfo->budget == $k) selected @endif value="{{$k}}">{{__($v)}}</option>
				@endforeach
			</select>
				
			<label class="mt-10">{{__('partner.booking_deposit')}}<span>*</span></label>
			<input type="text" name="deposit" value="{{$advert->service->deposit}}" required />
			
			<label>{{__('partner.payment_methods')}}<span>*</span></label>
			@foreach(\App\Helpers\PaymentMethodsTranslatorHelper::$_methods as $item)
				<span class="checkbox-item wide">
					<input type="checkbox" name="pay_methods[]" value="{{$item}}" @if(strpos($advert->service->paymeny, $item) != false) checked @endif>
					<span>{{\App\Helpers\PaymentMethodsTranslatorHelper::translate($item)}}</span>
				</span>
			@endforeach

			<span class="checkbox-item wide">
				@if(strpos($advert->service->paymeny, 'other') != false)
					<input type="checkbox" name="pay_methods[]" class="other-field additional" field="payment" value="other" checked>
				@else
					<input type="checkbox" name="pay_methods[]" class="other-field" field="payment" value="other">
				@endif
				
				<span>{{__('become_partner.other')}}</span>
			</span>
			@if(strpos($advert->service->paymeny, 'other') != false)
				<div class="for-payment additional-field mt-10 visible">
					<input type="text" name="otherpayment" maxlength="100" class="add-input-payment" value="{{$advert->service->other_payment}}" required="">
				</div>
			@else
				<div class="for-payment additional-field mt-10"></div>
			@endif
			
			
			<label>{{__('partner.delivery_charge')}}<span>*</span></label>
			<textarea name="delivery" rows="2" required>{{$advert->service->delivery}}</textarea>
		
			<label>{{__('partner.additional_expenses')}}<span>*</span></label>
			<textarea name="expences" rows="2" required>{{$advert->service->expences}}</textarea>
		
			<button type="submit" class="button">{{__('partner.save')}}</button>
		</div>
	</form>	
</div>
