<?php
/**
 * Created by Washin Engineer.
 * User: ngonhan
 * Date: 19/01/2018
 * Time: 14:37
 */

class ASolrUtils {

    /**
     * Create Solr date range
     * @param $fromDate
     * @param $toDate
     * @param string $format
     * @return string
     */
    public static function createSolrDateRage($fromDate, $toDate, $format='Y-m-d') {

        $defaultTZ = date_default_timezone_get();
        date_default_timezone_set("UTC");
        $from = $fromDate=='*'?'*':date($format,$fromDate);
        $to = $toDate=='*'?'*':date($format,$toDate);
        date_default_timezone_set($defaultTZ);

        return $from!=$to?"[$from TO $to]":"$from";
    }

    public static function criteriaFactory($sameWith){
        if ($sameWith instanceof ASolrDisMaxCriteria)
            return new ASolrDisMaxCriteria();
        else
            return new ASolrCriteria();
    }

}