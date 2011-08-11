Readable Timezone Field Type for Symfony2
=========================================

The stock Symfony2 timezone field type organizes all of the Olson Timezone Identifiers in PHP by Continent and displays them to the user. This dropdown is pretty bad from a UI perspective. This bundles provides an alternate dropdown that is similar to the one found when choosing a time zone on a Windows computer.

This is my first symfony2 bundle, feedback welcome!

Installation
------------

Edit your <code>deps</code> file and add the following:

```
[BertTimezoneBundle]
    git=git://github.com/bertrandom/BertTimezoneBundle.git
    target=/bundles/Bert/TimezoneBundle
```

Run the vendors install script:

`
bin/vendors install
`

This will pull down the latest version of this bundle from github. Alternatively you can just put the files in <code>/vendor/bundles/Bert/TimezoneBundle</code>

Next, add the namespace to the end of the <code>registerNamespaces</code> bit in <code>autoload.php</code>:


<pre>
$loader->registerNamespaces(array(
    'Symfony'          => array(__DIR__.'/../vendor/symfony/src', __DIR__.'/../vendor/bundles'),
    'Sensio'           => __DIR__.'/../vendor/bundles',

    .
    .
    .

	'Bert' 			   => __DIR__.'/../vendor/bundles',
));
</pre>

Add the bundle in <code>AppKernel.php</code>:

<pre>
$bundles = array(
    new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
    new Symfony\Bundle\SecurityBundle\SecurityBundle(),

    .
    .
    .

	new Bert\TimezoneBundle\BertTimezoneBundle(),
);
</pre>

That's it, the field type should be ready to use.

Usage
-----

Simply use the field type <code>readabletimezone</code> in your form builder, e.g.:

<pre>
$builder
    ->add('username')
    ->add('plainPassword', 'repeated', array('type' => 'password'))
	->add('firstname')
	->add('lastname')
	->add('email', 'email')
	->add('timezone', 'readabletimezone')
;
</pre>

Data
----

The data is taken from the work of two blog posts on the subject of readable timezones:

[Presenting a list of Timezones to the user](http://www.aviblock.com/blog/2009/03/12/presenting-a-list-of-timezones-to-the-user/)

[Olson Time Zone Database to Standard Windows Time Zone v0.1](http://www.timdavis.com.au/data/olson-time-zone-database-to-standard-windows-time-zone-v01/)

I've made mirrors of these two posts and put them in <code>Resources/source/mirrors/</code> in case the blog posts go away.

The timezone data itself can be found in <code>Resources/config/timezones.yml</code>

Credits
-------

Bertrand Fan (<code>bertrand@fan.net</code>)

Timezone data provided by Avi Block and Tim Davis, see Data section for more details.