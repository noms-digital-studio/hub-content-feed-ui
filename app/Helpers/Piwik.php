<?php 

namespace App\Helpers;

class Piwik {
   static function trackingCode() {
       $piwikUrl = $_ENV['PIWIK_URI'];

       if ($piwikUrl) {
           return "<!-- Piwik -->
           <script type=\"text/javascript\">
           var _paq = _paq || [];
           _paq.push(['trackPageView']);
           _paq.push(['enableLinkTracking']);
           (function() {
               var u=\"//" . $piwikUrl . "/\";
               _paq.push(['setTrackerUrl', u+'piwik.php']);
               _paq.push(['setSiteId', '1']);
               _paq.push(['setCustomVariable', 1, 'Prison', 'HMP Wayland', 'visit']);
               var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
               g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
           })();
           </script>
           <noscript><p><img src=\"//" . $piwikUrl . "/piwik.php?idsite=1\" style=\"border:0;\" alt=\"\" /></p></noscript>
           <!-- End Piwik Code -->";
       } else {
           return '';
       }
   }
}