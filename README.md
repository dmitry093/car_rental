car_rental
==========

A Symfony project created on March 29, 2017, 12:55 pm.

## ABOUT

Simple site for car rental organization

## FUNCTIONS

- Show/Add/Edit/Delete history of cars rent
- Show/Add/Edit/Delete cars
- Show/Add/Edit/Delete rental points
- Calculating average rental time for a specific car and rental point

## INSTALLATION

- Clone this repository;
- Install all dependencies using Composer;
- Create database using:
<pre>
    php bin/console doctrine:database:create
</pre>
- Create tables using:
<pre>
    php bin/console doctrine:schema:update --force
</pre>
- Load initial data using:
<pre>
    php bin/console doctrine:fixtures:load
</pre>

## USED TECHNOLOGIES

- <a href="https://symfony.com/">Symfony Framework</a>
- <a href="http://getbootstrap.com/">Twitter Bootstrap</a>
- <a href="http://bootstrap-table.wenzhixin.net.cn/"> Bootstrap Table</a>

