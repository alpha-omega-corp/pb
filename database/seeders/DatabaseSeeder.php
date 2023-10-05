<?php
namespace Database\Seeders;

use App\Models\EventPlace;
use App\Models\EventPlace as EventPlaceModel;
use Database\Factories\EventPlaceFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
        ]);

        DB::table('faq')->insert([
            'faq_created' => now(),
            'relation' => 1,
            'question_en' => 'Question en',
            'answer_en' => 'Answer en',
            'question_fr' => 'Comment fonctionne www.partybooker.ch',
            'answer_fr' => 'Partybooker is a free internet pe connection between customers and service providers via one site.',
        ]);

        DB::table('faq')->insert([
            'faq_created' => now(),
            'relation' => 1,
            'question_en' => 'Question en',
            'answer_en' => 'Answer en',
            'question_fr' => 'Comment fonctionne www.partybooker.ch',
            'answer_fr' => 'Partybooker is a free internet pe connection between customers and service providers via one site.',
        ]);

        DB::table('faq')->insert([
            'faq_created' => now(),
            'relation' => 1,
            'question_en' => 'Question en',
            'answer_en' => 'Answer en',
            'question_fr' => 'Comment fonctionne www.partybooker.ch',
            'answer_fr' => 'Partybooker is a free internet pe connection between customers and service providers via one site.',
        ]);

        $this->newPartner('dynam-event', 1);
        $this->newPartner('chillfood', 2);
        $this->newPartner('la-cave-geneve-vieille-ville', 3);
        $this->newPartner('moulin-du-creux-vich', 4);
        $this->newPartner('chateau-de-coppet', 5);
        $this->newPartner('twist-events-carouge-geneve', 6);
        $this->newPartner('domaine-la-capitaine', 7);
        $this->newPartner('domaine-des-esserts', 8);
        $this->newPartner('la-caravane-passe-geneve', 9);
        $this->newPartner('headphone-music--silent-disco', 10);

        $this->newPlan(
            'Standart',
            '1',
            '0',
            '5',
            '1',
            '1',
            '300',
            '365'
        );

        $this->newPlan(
            'Premium',
            '1',
            '0',
            '10',
            '0',
            '1',
            '500',
            '365'
        );

        $this->newPlan(
            'Exclusif',
            '3',
            '0',
            '15',
            '0',
            '1',
            '950',
            '365'
        );

        $this->newPlan(
            'Basic',
            '10',
            '0',
            '1',
            '0',
            '1',
            '0',
            '365'
        );


        $this->newPlan(
            'Commission',
            '10',
            '0',
            '1',
            '0',
            '0',
            '0',
            '365'
        );

        DB::table('settings')->insert([
            'address' => '1296 Coppet, Suisse',
            'email' => 'contact@partybooker.ch',
            'phone' => '+41 (079 8588872',
            'facebook' => 'https://www.facebook.com/partybooker.ch/',
            'linkedin' => 'https://www.linkedin.com/company/partybooker',
            'instagram' => 'https://www.instagram.com/partybooker/',
            'user_terms_en' => 'Terms en',
            'service_terms_en' => 'Services en',
            'user_terms_fr' => 'Terms fr',
            'service_terms_fr' => 'Services fr',
        ]);

        DB::table('users')->insert([
            'name' => 'Nicholas',
            'email' => 'bleyo@alphomega.org',
            'email_verification' => 1,
            'password' => bcrypt('password'),
            'type' => 'admin',
            'provider' => null,
            'provider_id' => null,
        ]);

        DB::table('users')->insert([
            'name' => 'Paul',
            'email' => 'paul@alphomega.org',
            'email_verification' => 1,
            'password' => bcrypt('password'),
            'provider' => null,
            'provider_id' => null,
        ]);
    }

    private function newPlan(
        string $name,
        int $positon,
        bool $listing,
        int $photos,
        int $videos,
        int $requests,
        int $price,
        int $duration
    ) {
        $id = DB::table('plans')->insertGetId([
            'name' => $name,
            'plan_created' => now(),
            'position' => $positon,
            'listing' => $listing,
            'photos_num' => $photos,
            'video' => $videos,
            'direct_request' => $requests,
            'price' => $price,
            'days_period' => $duration,
        ]);

        DB::table('plan_options')->insert([
            'plans_id' => $id,
            'categories_count' => 1,
            'sub_categories_count' => 1,
            'group' => 1
        ]);
    }

    private function newPartner(string $slug, $r)
    {
        $partnerId = DB::table('partners_info')->insertGetId([
            'id_partner' => '120036190814-044' . $r,
            'en_company_name' => $slug,
            'fr_company_name' => $slug,
            'slug' => $slug,
            'average_rate' => 3,
            'plans_id' => 2,
            'plan_option_group' => 2,
            'payment_status' => true,
            'public' => true,
            'payed' => '2020-09-18',
            'expiration_date' => '2024-09-18',
            'location_code' => 'VD',
            'address' => 'Rue de la Gare 19, Montreux, Suisse',
            'lat' => '46.4364302',
            'lon' => '6.911386499999935',
            'phone' => '+4121989889' . $r,
            'company_phone' => '+4121939889' . $r,
            'language' => '["french","english","german","italian"]',
            'price' => true,
            'budget' => true,
            'priority' => 1,
            'plan' => 'exclusif',
            'en_slogan' => "Un Chef d'oeuvre au bord du lac Léman",
            'fr_slogan' => "Un Chef d'oeuvre au bord du lac Léman",

            'category_1' => 'cat3',
            'subcat_1' => 'cat3_2',

            'www' => 'https://www.' . $slug . '.ch',
            'facebook' => 'https://www.facebook.com/' . $slug,
            'instagram' => 'https://www.instagram.com/' . $slug,
            'linkedin' => 'https://www.linkedin.com/company/' . $slug,
            'youtube' => 'https://www.youtube.com/' . $slug,
            'twitter' => 'https://www.twitter.com/' . $slug,
            'vimeo' => 'https://www.vimeo.com/' . $slug,

            'en_short_descr' => 'En plein centre de Vevey historique, face à l’étendue somptueuse du lac et de la Riviera Vaudoise, retrouvez le Château de l’Aile, prestigieux monument historique néo-gothique du XIXe siècle alliant authenticité et artisanat d’exception. Le Château de l’Aile de Vevey est l’adresse privilégiée pour organiser un événement spécial face au plus beau panorama de la Riviera dans un cadre idyllique et unique en Suisse. Les différents salons du Château, ainsi que son jardin, proposent un cadre époustouflant s’adaptant à l’envergure de votre événement. Qu’il s’agisse d’événements privés ou professionnels, ce chef d’oeuvre architectural restauré avec passion et savoir-faire saura vous séduire.',
            'fr_short_descr' => 'En plein centre de Vevey historique, face à l’étendue somptueuse du lac et de la Riviera Vaudoise, retrouvez le Château de l’Aile, prestigieux monument historique néo-gothique du XIXe siècle alliant authenticité et artisanat d’exception. Le Château de l’Aile de Vevey est l’adresse privilégiée pour organiser un événement spécial face au plus beau panorama de la Riviera dans un cadre idyllique et unique en Suisse. Les différents salons du Château, ainsi que son jardin, proposent un cadre époustouflant s’adaptant à l’envergure de votre événement. Qu’il s’agisse d’événements privés ou professionnels, ce chef d’oeuvre architectural restauré avec passion et savoir-faire saura vous séduire.',
            'en_full_descr' => 'En plein centre de Vevey historique, face à l’étendue somptueuse du lac et de la Riviera Vaudoise, retrouvez le Château de l’Aile, prestigieux monument historique néo-gothique du XIXe siècle alliant authenticité et artisanat d’exception. Le Château de l’Aile de Vevey est l’adresse privilégiée pour organiser un événement spécial face au plus beau panorama de la Riviera dans un cadre idyllique et unique en Suisse. Les différents salons du Château, ainsi que son jardin, proposent un cadre époustouflant s’adaptant à l’envergure de votre événement. Qu’il s’agisse d’événements privés ou professionnels, ce chef d’oeuvre architectural restauré avec passion et savoir-faire saura vous séduire.',
            'fr_full_descr' => 'En plein centre de Vevey historique, face à l’étendue somptueuse du lac et de la Riviera Vaudoise, retrouvez le Château de l’Aile, prestigieux monument historique néo-gothique du XIXe siècle alliant authenticité et artisanat d’exception. Le Château de l’Aile de Vevey est l’adresse privilégiée pour organiser un événement spécial face au plus beau panorama de la Riviera dans un cadre idyllique et unique en Suisse. Les différents salons du Château, ainsi que son jardin, proposent un cadre époustouflant s’adaptant à l’envergure de votre événement. Qu’il s’agisse d’événements privés ou professionnels, ce chef d’oeuvre architectural restauré avec passion et savoir-faire saura vous séduire.',
            'other_lang' => null,
        ]);

        EventPlace::factory([
            'id_partner' => '120036190814-044' . $r
        ])->count(2)->create();


        DB::table('adverts')->insert([
            'partners_info_id' => $partnerId,
            'category_id' => 1,
            'status' => 1,
            'view_name' => 'event-place',
            'service_type' => 'App\Models\EventPlace',
            'service_id' => 26,
        ]);

        DB::table('adverts')->insert([
            'partners_info_id' => $partnerId,
            'category_id' => 3,
            'status' => 1,
            'view_name' => 'caterer',
            'service_type' => 'App\Models\Caterer',
            'service_id' => 26,
        ]);


        DB::table('users')->insert([
            'name' => $slug,
            'email' => $slug . '@alphomega.org',
            'id_partner' => '120036190814-044' . $r,
            'email_verification' => 1,
            'password' => bcrypt('password'),
            'type' => 'admin',
            'provider' => null,
            'provider_id' => null,
        ]);


    }


}
