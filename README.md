# Ixion - Out of this world engagement

## What?
Ixion is a web-scale, next-generation engagement platform driven by microservices.  Fancy, huh?

This means that it can scale to your needs, be that:

- Multi-tenancy & Realm-aware Access Controls
- Basic CRM functionality
- Mass Email Campaigns
- SMS/MMS/Voice Workflows
- Media Library
- CMS with Pages, Categories and Posts
- Contact Forms

tl;dr: This is RAWR 2.0, as it should have been - if you know what hell that was.

## How?

Assembling Ixion can be rather difficult and requires a Jenkins-driven CI/CD pipeline and is built with Ansible Operators to be deployed on Kubernetes platforms such as Red Hat OpenShift Container Platform.

### Requirements

- Twilio Account & Phone Numbers for SMS/MMS/Voice
- Mailgun Account for Emailing
- Kubernetes platform
- Jenkins CI/CD Build Server

### Instructions - (Maybe)

```
$ cp .env.example .env
$ # Modify the .env file to suit your needs
$ composer install
$ npm install
$ npm run dev
$ php artisan key:generate
$ php artisan cache:clear
$ php artisan migrate
$ php artisan db:seed --class=SystemSettingsSeeder
$ php artisan db:seed --class=PermissionsTableSeeder
$ php artisan db:seed --class=RolesTableSeeder
$ php artisan db:seed --class=MenuTableSeeder
```