<?php

namespace App\Enums;

enum ModalName
{
    case APP_LOGIN;
    case APP_REGISTER;

    case APP_LISTING_SEARCH;
    case APP_CATEGORY;
    case APP_CATEGORY_TAG;
    case APP_COMMENT;
    case APP_INFORMATION;
    case APP_POST;
    case APP_FAQ;
    case APP_PLAN;
    case APP_USP;
    case APP_CONTACT;
    case APP_CONTENT;
    case APP_ABOUT;
    case APP_ABOUT_ITEM;
    case APP_HELP;
    case APP_FORM;

    case GUEST_PARTNERSHIP;

    case ADMIN_MESSAGE;

    case PARTNER;
    case PARTNER_COMPANY;
    case PARTNER_COMPANY_SOCIALS;
    case PARTNER_COMPANY_STATS;
    case PARTNER_COMPANY_CONTACTS;
    case PARTNER_COMPANY_LOGO;
    case PARTNER_COMPANY_DESCRIPTION;

    case PARTNER_PLAN;
    case PARTNER_SERVICE_IMAGE;

    case PARTNER_ADVERT;
    case PARTNER_ADVERT_TAG;
    case PARTNER_ADVERT_DESCRIPTION;
    case PARTNER_ADVERT_ACCESS;
    case PARTNER_ADVERT_SEO;
    case PARTNER_ADVERT_IMAGE;
    case PARTNER_ADVERT_REQUEST;
    case PARTNER_ADVERT_CATEGORY;

    case MORE_TOPS;
    case MORE_INFORMATION;
    case MORE_COMMENTS;
}
