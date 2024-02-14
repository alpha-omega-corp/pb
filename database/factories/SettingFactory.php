<?php

namespace Database\Factories;

use App\Models\Setting;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Setting>
 */
class SettingFactory extends Factory
{
    protected $model = Setting::class;

    public function definition(): array
    {
        return [
            'address' => '1296 Coppet, Suisse',
            'email' => 'contact@partybooker.ch',
            'phone' => '+41 (079 8588872',
            'facebook' => 'https://www.facebook.com/partybooker.ch/',
            'linkedin' => 'https://www.linkedin.com/company/partybooker',
            'instagram' => 'https://www.instagram.com/partybooker/',
            'user_terms_en' => '<ol style="margin-bottom: 0px;"><li><div><span style="font-size: 24px;"><b>Généralités</b></span></div><div><br></div><div><span style="font-size: 14px;">Les informations et conseils publiés sur www.partybooker.ch sont destinés à des privés ou professionnels désireux d’organiser un événement. Le contenu du site est exclusivement informatif. Visiter, consulter et s’inspirer sur le site est gratuit.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Limitation de la responsabilité de Partybooker</b></span></div><div><br></div><div><span style="font-size: 14px;">Partybooker n’est en aucun cas responsable de la qualité et/ou de l’exécution des services des prestataires présentés et/ou réservés sur le site www.partybooker.ch.</span></div><div><br></div><div><span style="font-size: 14px;">Partybooker ne saurait en aucun cas être tenu responsable des contenus, des activités commerciales, des produits et des services proposés à travers les sites vers lesquels des liens hypertextes, directs ou indirects, sont réalisés.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker met tout en oeuvre pour que le contenu du site soit à jour et reflète la réalité mais ne peut être tenu responsable de données erronées ou obsolètes. S’il s’avérait qu’une information, offre ou promotion était échue ou inexacte, les internautes renoncent à tout dédommagement ou poursuites de Partybooker.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker se réserve le droit de bloquer temporairement l’accès au site pour effectuer des maintenances nécessaires au bon fonctionnement. Partybooker n’est pas responsable d’éventuels problèmes techniques liés à l’hébergement de son site.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">La responsabilité de Partybooker est limitée aux cas de faute intentionnelle ou de négligence grave.</span></div><div><span style="font-size: 14px;">Toute responsabilité de Partybooker pour d’éventuels préjudices supplémentaires ou indirects est expressément exclue.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Utilisation des données personnelles</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker se réserve le droit d’utiliser les données personnelles collectées lors de demandes d’offre ou d’une inscription sur le site pour communiquer des informations susceptibles d’intéresser ladite personne.</span></div><div><br></div><div><span style="font-size: 14px;">L’internaute accepte que les données personnelles qu’il a fournies lors d’une demande d’offre à l’un de nos prestataires soient transmises à ce dernier afin de prendre contact ou de réserver une prestation, un équipement ou un service.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Pas de transmission de données personnelles à des tiers</b></span></div><div><span style="font-size: 24px;"><b><br></b></span></div><div><span style="font-size: 14px;">Partybooker ne communique pas de données personnelles à des tiers, sauf dans le cas mentionné sous “Utilisation des données personnelles”.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Cookies</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Le site www.partybooker.ch emploie des cookies pour déterminer les intérêts de ses internautes, dans le but d’améliorer le site. L’utilisateur a la possibilité d’empêcher la formation de cookies en sélectionnant l’option correspondante sur son programme de navigation.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Propriété des données</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Les données communiquées sur le site sont recueillies, traitées et publiées par Partybooker. Partybooker est propriétaire de la base de données publiée sur son site. Il est interdit de reproduire, d’utiliser, de copier, modifier ou de vendre ces informations.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Entrée en vigueur</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Les présentes conditions générales entrent en vigueur le 1er janvier 2014.</span></div></li></ol>',
            'user_terms_fr' => '<ol style="margin-bottom: 0px;"><li><div><span style="font-size: 24px;"><b>Généralités</b></span></div><div><br></div><div><span style="font-size: 14px;">Les informations et conseils publiés sur www.partybooker.ch sont destinés à des privés ou professionnels désireux d’organiser un événement. Le contenu du site est exclusivement informatif. Visiter, consulter et s’inspirer sur le site est gratuit.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Limitation de la responsabilité de Partybooker</b></span></div><div><br></div><div><span style="font-size: 14px;">Partybooker n’est en aucun cas responsable de la qualité et/ou de l’exécution des services des prestataires présentés et/ou réservés sur le site www.partybooker.ch.</span></div><div><br></div><div><span style="font-size: 14px;">Partybooker ne saurait en aucun cas être tenu responsable des contenus, des activités commerciales, des produits et des services proposés à travers les sites vers lesquels des liens hypertextes, directs ou indirects, sont réalisés.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker met tout en oeuvre pour que le contenu du site soit à jour et reflète la réalité mais ne peut être tenu responsable de données erronées ou obsolètes. S’il s’avérait qu’une information, offre ou promotion était échue ou inexacte, les internautes renoncent à tout dédommagement ou poursuites de Partybooker.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker se réserve le droit de bloquer temporairement l’accès au site pour effectuer des maintenances nécessaires au bon fonctionnement. Partybooker n’est pas responsable d’éventuels problèmes techniques liés à l’hébergement de son site.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">La responsabilité de Partybooker est limitée aux cas de faute intentionnelle ou de négligence grave.</span></div><div><span style="font-size: 14px;">Toute responsabilité de Partybooker pour d’éventuels préjudices supplémentaires ou indirects est expressément exclue.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Utilisation des données personnelles</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker se réserve le droit d’utiliser les données personnelles collectées lors de demandes d’offre ou d’une inscription sur le site pour communiquer des informations susceptibles d’intéresser ladite personne.</span></div><div><br></div><div><span style="font-size: 14px;">L’internaute accepte que les données personnelles qu’il a fournies lors d’une demande d’offre à l’un de nos prestataires soient transmises à ce dernier afin de prendre contact ou de réserver une prestation, un équipement ou un service.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Pas de transmission de données personnelles à des tiers</b></span></div><div><span style="font-size: 24px;"><b><br></b></span></div><div><span style="font-size: 14px;">Partybooker ne communique pas de données personnelles à des tiers, sauf dans le cas mentionné sous “Utilisation des données personnelles”.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Cookies</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Le site www.partybooker.ch emploie des cookies pour déterminer les intérêts de ses internautes, dans le but d’améliorer le site. L’utilisateur a la possibilité d’empêcher la formation de cookies en sélectionnant l’option correspondante sur son programme de navigation.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Propriété des données</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Les données communiquées sur le site sont recueillies, traitées et publiées par Partybooker. Partybooker est propriétaire de la base de données publiée sur son site. Il est interdit de reproduire, d’utiliser, de copier, modifier ou de vendre ces informations.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Entrée en vigueur</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Les présentes conditions générales entrent en vigueur le 1er janvier 2014.</span></div></li></ol>',
            'service_terms_en' => '<ol style="margin-bottom: 0px;"><li><div><span style="font-size: 24px;"><b>Généralités</b></span></div><div><br></div><div><span style="font-size: 14px;">Les informations et conseils publiés sur www.partybooker.ch sont destinés à des privés ou professionnels désireux d’organiser un événement. Le contenu du site est exclusivement informatif. Visiter, consulter et s’inspirer sur le site est gratuit.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Limitation de la responsabilité de Partybooker</b></span></div><div><br></div><div><span style="font-size: 14px;">Partybooker n’est en aucun cas responsable de la qualité et/ou de l’exécution des services des prestataires présentés et/ou réservés sur le site www.partybooker.ch.</span></div><div><br></div><div><span style="font-size: 14px;">Partybooker ne saurait en aucun cas être tenu responsable des contenus, des activités commerciales, des produits et des services proposés à travers les sites vers lesquels des liens hypertextes, directs ou indirects, sont réalisés.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker met tout en oeuvre pour que le contenu du site soit à jour et reflète la réalité mais ne peut être tenu responsable de données erronées ou obsolètes. S’il s’avérait qu’une information, offre ou promotion était échue ou inexacte, les internautes renoncent à tout dédommagement ou poursuites de Partybooker.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker se réserve le droit de bloquer temporairement l’accès au site pour effectuer des maintenances nécessaires au bon fonctionnement. Partybooker n’est pas responsable d’éventuels problèmes techniques liés à l’hébergement de son site.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">La responsabilité de Partybooker est limitée aux cas de faute intentionnelle ou de négligence grave.</span></div><div><span style="font-size: 14px;">Toute responsabilité de Partybooker pour d’éventuels préjudices supplémentaires ou indirects est expressément exclue.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Utilisation des données personnelles</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker se réserve le droit d’utiliser les données personnelles collectées lors de demandes d’offre ou d’une inscription sur le site pour communiquer des informations susceptibles d’intéresser ladite personne.</span></div><div><br></div><div><span style="font-size: 14px;">L’internaute accepte que les données personnelles qu’il a fournies lors d’une demande d’offre à l’un de nos prestataires soient transmises à ce dernier afin de prendre contact ou de réserver une prestation, un équipement ou un service.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Pas de transmission de données personnelles à des tiers</b></span></div><div><span style="font-size: 24px;"><b><br></b></span></div><div><span style="font-size: 14px;">Partybooker ne communique pas de données personnelles à des tiers, sauf dans le cas mentionné sous “Utilisation des données personnelles”.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Cookies</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Le site www.partybooker.ch emploie des cookies pour déterminer les intérêts de ses internautes, dans le but d’améliorer le site. L’utilisateur a la possibilité d’empêcher la formation de cookies en sélectionnant l’option correspondante sur son programme de navigation.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Propriété des données</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Les données communiquées sur le site sont recueillies, traitées et publiées par Partybooker. Partybooker est propriétaire de la base de données publiée sur son site. Il est interdit de reproduire, d’utiliser, de copier, modifier ou de vendre ces informations.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Entrée en vigueur</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Les présentes conditions générales entrent en vigueur le 1er janvier 2014.</span></div></li></ol>',
            'service_terms_fr' => '<ol style="margin-bottom: 0px;"><li><div><span style="font-size: 24px;"><b>Généralités</b></span></div><div><br></div><div><span style="font-size: 14px;">Les informations et conseils publiés sur www.partybooker.ch sont destinés à des privés ou professionnels désireux d’organiser un événement. Le contenu du site est exclusivement informatif. Visiter, consulter et s’inspirer sur le site est gratuit.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Limitation de la responsabilité de Partybooker</b></span></div><div><br></div><div><span style="font-size: 14px;">Partybooker n’est en aucun cas responsable de la qualité et/ou de l’exécution des services des prestataires présentés et/ou réservés sur le site www.partybooker.ch.</span></div><div><br></div><div><span style="font-size: 14px;">Partybooker ne saurait en aucun cas être tenu responsable des contenus, des activités commerciales, des produits et des services proposés à travers les sites vers lesquels des liens hypertextes, directs ou indirects, sont réalisés.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker met tout en oeuvre pour que le contenu du site soit à jour et reflète la réalité mais ne peut être tenu responsable de données erronées ou obsolètes. S’il s’avérait qu’une information, offre ou promotion était échue ou inexacte, les internautes renoncent à tout dédommagement ou poursuites de Partybooker.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker se réserve le droit de bloquer temporairement l’accès au site pour effectuer des maintenances nécessaires au bon fonctionnement. Partybooker n’est pas responsable d’éventuels problèmes techniques liés à l’hébergement de son site.</span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">La responsabilité de Partybooker est limitée aux cas de faute intentionnelle ou de négligence grave.</span></div><div><span style="font-size: 14px;">Toute responsabilité de Partybooker pour d’éventuels préjudices supplémentaires ou indirects est expressément exclue.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Utilisation des données personnelles</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Partybooker se réserve le droit d’utiliser les données personnelles collectées lors de demandes d’offre ou d’une inscription sur le site pour communiquer des informations susceptibles d’intéresser ladite personne.</span></div><div><br></div><div><span style="font-size: 14px;">L’internaute accepte que les données personnelles qu’il a fournies lors d’une demande d’offre à l’un de nos prestataires soient transmises à ce dernier afin de prendre contact ou de réserver une prestation, un équipement ou un service.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Pas de transmission de données personnelles à des tiers</b></span></div><div><span style="font-size: 24px;"><b><br></b></span></div><div><span style="font-size: 14px;">Partybooker ne communique pas de données personnelles à des tiers, sauf dans le cas mentionné sous “Utilisation des données personnelles”.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Cookies</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Le site www.partybooker.ch emploie des cookies pour déterminer les intérêts de ses internautes, dans le but d’améliorer le site. L’utilisateur a la possibilité d’empêcher la formation de cookies en sélectionnant l’option correspondante sur son programme de navigation.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Propriété des données</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Les données communiquées sur le site sont recueillies, traitées et publiées par Partybooker. Partybooker est propriétaire de la base de données publiée sur son site. Il est interdit de reproduire, d’utiliser, de copier, modifier ou de vendre ces informations.</span></div><div><br></div><div><br></div><div><span style="font-size: 24px;"><b>Entrée en vigueur</b></span></div><div><span style="font-size: 14px;"><br></span></div><div><span style="font-size: 14px;">Les présentes conditions générales entrent en vigueur le 1er janvier 2014.</span></div></li></ol>',
        ];
    }
}
