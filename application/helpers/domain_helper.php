<?php

if (!function_exists('get_company_info')) {
    function get_company_info($db)
    {
        $url_host = 'https://kanzupermaiabadi.co.id/perumah/murah';
        $parsedUrl = parse_url($url_host);
        $domain = $parsedUrl['host'];

        switch ($domain) {
            case 'kanzupermaiabadi.co.id':
                $id_company = '1';
                break;
            case 'altonpermaiabadi.co.id':
                $id_company = '2';
                break;
            case 'alamkautsarsejahtera.co.id':
                $id_company = '3';
                break;
            default:
                return null;
        }

        $db->select('id_company, nm_company, logo_company, desc_company');
        $db->from('company');
        $db->where('id_company', $id_company);
        $query = $db->get();

        if ($query->num_rows() > 0) {
            $row = $query->row();
            return [
                'id_company' => $row->id_company,
                'nm_company' => $row->nm_company,
                'logo_company' => $row->logo_company,
                'description' => $row->desc_company,
                'domain' => $domain
            ];
        } else {
            return null;
        }
    }
}
