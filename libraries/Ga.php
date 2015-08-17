<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ga
{
    /*
     *  Local CI instance    
     */
    private $CI;
    /*
     *  GA account config item    
     */
    private $ga_account;
    
    /*
     * Init GA library
     */
    public function Ga()
    {
        $this->CI =& get_instance();
        
        $this->ga_account = config_item('ga_account');

    }

    /*
    * Get GA html
    */
    public function Get_html()
    {
      // Validate config items
        // if (!in_array(strlen($this->ga_account) == 0)) {
        //     return "GA config items not setup correctly, please check library config settings";
        // }

        return  "
                <script type='text/javascript'>

                  var _gaq = _gaq || [];
                  _gaq.push(['_setAccount', '".$this->ga_account."']);
                  _gaq.push(['_trackPageview']);

                  (function() {
                    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
                    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
                  })();

                </script>
                ";
    } 

}
