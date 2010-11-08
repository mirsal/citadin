<?php
/**
 * Renders tracking code on every page.
 *
 * To activate, add the following code to your application's filters.yml file,
 * just below the web_debug filter.
 * 
 * <code>
 *  rendering: ~
 *  web_debug: ~
 *
 *  google_analytics:
 *    class: googleAnalyticsFilter
 *
 *  # etc ...
 * </code>
 */
class googleAnalyticsFilter extends sfFilter
{
  public function execute($filterChain)
  {
    /*
     *  yield the filter chain execution,
     *  we want this filter to execute after the view has been rendered
     */
    $filterChain->execute();

    /*
     * Decorate the response with the tracker code.
     * See: http://www.google.com/support/googleanalytics/bin/answer.py?answer=174090
     */
    $googleCode = sprintf("
  <script type=\"text/javascript\">

    /* <![CDATA[ */

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '%s']);
    _gaq.push(['_trackPageview']);

    (function() {
      var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
      ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
      var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();

    /* ]]>

  </script>*/
",    $this->getParameter('google_profile_id'));

    $response = $this->getContext()->getResponse();
    $response->setContent(str_ireplace('</body>', $googleCode.'</body>',$response->getContent()));
   }
}
