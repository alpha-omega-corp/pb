<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PartnersInfo extends Migration
{
    /* COMPANY MAIN INFO */
   public function up()
    {
        Schema::create('partners_info', function (Blueprint $table) {
            $table->increments('id');
			
			//SERVICE PROVIDER ID: 
			$table->string('id_partner', 30);
			
			//COMPANY NAME:
			$table->string('company_name', 30)->unique();
			
			//PLAN
			$table->string('location', 10);
			
			//STATUS
			$table->boolean('location', 10)->default(0);
			
			//PAYED
			$table->dateTime('payed');
			
			//EXPIRATION DATE
			$table->dateTime('expiration_date');
			
			//LOCATION:
			$table->string('location', 10);
			
			//ADDRESS, POSTCODE
			$table->string('address', 100);
			
			//PHONE
			$table->string('phone', 30)->nullable()->unique();
			
			//FAX
			$table->string('fax', 30)->nullable();
			
			//LOGO
			$table->string('logo')->nullable();
			
			//SLOGAN
			$table->string('slogan',250)->nullable();
			
			//SHORT DESCRIPTION
			$table->string('short_descr',350);
			
			//FULL DESCRIPTION
			$table->string('full_descr',3000);
			
			//LANGUAGE
			$table->string('language');
			
			//CATEGORY
			$table->string('category');
			
			//WWW - website
			$table->string('www')->nullable()->unique();
			
			//WWW - facebook
			$table->string('facebook')->nullable();
			
			//WWW - twitter
			$table->string('twitter')->nullable();
			
			//WWW - instagram
			$table->string('instagram')->nullable();
			
			//WWW - linkedin
			$table->string('linkedin')->nullable();
			
			//WWW - youtube
			$table->string('youtube')->nullable();
			
			//WWW - vimeo
			$table->string('vimeo')->nullable();
			
		});
    }
	
    public function down()
    {
        Schema::dropIfExists('partners_info');
    }
}
