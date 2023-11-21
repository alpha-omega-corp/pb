@props([
    'partner'
])

<form method="POST"
      action="{{url(App\Http\Middleware\LocaleMiddleware::getLocale().'/partner-cp/edit-company-description')}}">
    @csrf
    <div class="edit-company-description">
        <x-partner-category-tab :tabs="[
            ucfirst(__('become_partner.french')),
            ucfirst(__('become_partner.english'))
    ]">
            <!-- French -->
            <x-tab.item>
                <div class="edit-company-section">
                    <div class="description-card-title">
                        <img src="{{Vite::image('icons/france.svg')}}" alt="english" class="me-2"/>
                    </div>


                    <div class="mt-2">
                        <div>
                            <div class="w-100">
                                <label for="fr_short_descr">{{__('partybooker-cp.short_description')}}</label>
                                <textarea name="fr_short_descr" id="fr_short_descr" maxlength="350"
                                          rows="10" required
                                          class="textarea-wysiwyg">{{$partner->fr_short_descr}}</textarea>
                            </div>

                            <div class="w-100">
                                <label for="fr_full_descr">{{__('partybooker-cp.full_description')}}</label>
                                <textarea name="fr_full_descr" id="fr_full_descr" maxlength="3000"
                                          rows="10" required
                                          class="textarea-wysiwyg">{{$partner->fr_full_descr}}</textarea>
                            </div>
                        </div>
                    </div>

                    <x-dashboard.textarea name="fr_slogan"
                                          :label="__('partybooker-cp.slogan')"
                                          icon="heroicon-o-chat-bubble-bottom-center-text"
                                          :max="250">{{$partner->fr_slogan}}
                    </x-dashboard.textarea>

                    <x-dashboard.profile.seo lang="fr" :partner="$partner"/>
                </div>
            </x-tab.item>

            <!-- English -->
            <x-tab.item>
                <div class="edit-company-section">
                    <div class="description-card-title">
                        <img src="{{Vite::image('icons/uk-flag.svg')}}" alt="english"/>
                    </div>


                    <div class="mt-2">
                        <label for="en_short_descr">{{__('partybooker-cp.short_description')}}</label>
                        <textarea name="en_short_descr" id="en_short_descr" maxlength="350" required
                                  class="textarea-wysiwyg">{{$partner->en_short_descr}}</textarea>

                        <label for="en_full_descr">{{__('partybooker-cp.full_description')}}</label>
                        <textarea name="en_full_descr" id="en_full_descr" maxlength="3000" required
                                  class="textarea-wysiwyg">{{$partner->en_full_descr}}</textarea>

                    </div>

                    <x-dashboard.textarea name="en_slogan"
                                          :label="__('partybooker-cp.slogan')"
                                          icon="heroicon-o-chat-bubble-bottom-center-text"
                                          :max="250">{{$partner->en_slogan}}</x-dashboard.textarea>

                    <x-dashboard.profile.seo lang="en" :partner="$partner"/>
                </div>
            </x-tab.item>
        </x-partner-category-tab>
    </div>

    <input type="hidden" name="id_partner" value="{{$partner->id_partner}}" hidden/>


    <div class="d-flex">
        <button type="submit" class="btn btn-accent mx-3 mb-3 w-100">{{__('partner.save')}}</button>
    </div>
</form>


