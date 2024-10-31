<?php
/*
	Plugin Name: Replytocom Redirector
	Plugin URI: http://transposh.org/
	Description: Fix replytocom bots by redirecting them away from that parameter.
	Author: Team Transposh
	Version: 1.0
	Author URI: http://transposh.org/
	License: GPL (http://www.gnu.org/licenses/gpl.txt)
*/
//This plugin comes to solve a problem with some bots that do not know how to handle the replytocom parameter as part of a wordpress url. This solves the redundant traffic and content duplication caused by those bots.
/*  Copyright © 2009 Transposh Team (website : http://transposh.org)
 *
 *	This program is free software; you can redistribute it and/or modify
 *	it under the terms of the GNU General Public License as published by
 *	the Free Software Foundation; either version 2 of the License, or
 *	(at your option) any later version.
 *
 *	This program is distributed in the hope that it will be useful,
 *	but WITHOUT ANY WARRANTY; without even the implied warranty of
 *	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *	GNU General Public License for more details.
 *
 *	You should have received a copy of the GNU General Public License
 *	along with this program; if not, write to the Free Software
 *	Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//avoid direct calls to this file where wp core files not present
if (!function_exists ('add_action')) {
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
}

//require_once("core/logging.php");

/**
 * This class represents the complete plugin
 */
class replytocom_plugin {
    /**
     * class constructor
     */
    function replytocom_plugin() {
        add_action('init', array(&$this,'on_init'),0); // really high priority
        register_activation_hook(__FILE__, array(&$this,'plugin_activate'));
        register_deactivation_hook(__FILE__,array(&$this,'plugin_deactivate'));
    }

    /**
     * Here we'll catch the annoying bot requests for replytocom and redirect them away
     */
    function on_init() {
        // if its a bot...
        if (preg_match("#(bot|yandex|google|jeeves|spider|crawler|slurp)#si", $_SERVER['HTTP_USER_AGENT'])) {
            // if it has the annoying replytocom in the request
            if ( stripos($_SERVER['REQUEST_URI'],'replytocom=') !== false) {
                $urlpart = explode('replytocom=',$_SERVER["REQUEST_URI"],2);
                wp_redirect(rtrim($urlpart[0],"?&"),301);
                exit;
            }
        }
    }

    /**
     * Plugin activation
     */
    function plugin_activate() {
        // noting to do here...
    }

    /**
     * Plugin deactivation
     */
    function plugin_deactivate() {
        // noting to do here either...
    }
}
$my_replytocom_plugin = new replytocom_plugin();
?>