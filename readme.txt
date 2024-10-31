=== Replytcom Redirector - solves bad bots problem with replytocom parameter ===
Contributors: oferwald
Donate link: http://transposh.org/donate/
Tags: replytocom, bandwidth saving, bad robots
Requires at least: 2.7
Tested up to: 2.9
Stable tag: 1.0

Replytocom redirector plugin solves a problem with some bots that do not know how to handle the replytocom parameter as part of a wordpress url.

== Description ==
The Replytocom redirector is a really simple plugin coming to solve the problem of silly bots that scan the replytocom urls in a wordpress blog
those urls have no value whatsoever for a bot as they contain duplicate content. even so - the bots keep scanning and scanning.
In just under 9 months on our site we have had over 200,000 such requests, and it is not even a big site.Duplicate this by a minimal size of 10k
of html code sent to the bot, and it seems like at least 2Gbyte of traffic was wasted for this nonsense.

This plugin solves the problem by simply redirecting such bots to the correct url, saving cpu, network resources and little bunnies.

If you ever encountered this and wanted to solve this, invest two minutes of your life and install this.

== Installation ==

1. Upload the plugin to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. No settings, no nothing - you are good to go

== Frequently Asked Questions ==

= Should I install this? =

If you see those requests in your log and this annoys you, than what the hack. If not, don't.

= Who are the worst offenders? =

For us atleast:

* Yeti/1.0 (NHN Corp.; http://help.naver.com/robots/)
* Baiduspider+(+http://www.baidu.com/search/spider.htm)
* Yandex/1.01.001 (compatible; Win16; I)

There are others, but not so annoyingly, seems like google is not really affected by this, although a search for replytocom returns too many results
so maybe its just us.

= How can I see its working =

Look at your logs, grep replytocom and see that spiders get a 301 result

= Something is wrong =

Just let us know on the forums here, or on our site

= There are other ways =

Yes, you can probably do this in htaccess and other ways, but this is a simple and targeted solution for this simple problem

= I have an idea =

Again, just let us know

= How is this connected to transposh? =

Not by much, we saw this, wanted to solve it - so here it is, you are always welcomed to try transposh out at [transposh site](http://transposh.org "transposh website")

== Changelog ==
= 2009/12/18 - 1.0 =
 * Initial release