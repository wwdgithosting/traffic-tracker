<?php

namespace App\Imports;

use App\Models\FeedLog;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportFeed implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function model(array $row)
    {
        return new FeedLog([
            'feed_date' => date('Y-m-d', $row['date']),
            'partner' => $row['partner'] ?? '',
            'subid' => $row['subid'] ?? '',
            'ip' => $row['ip'] ?? '',
            'country_iso' => $row['country_iso'] ?? '',
            'keyword' => $row['keyword'] ?? '',
            'browser' => $row['browser'] ?? '',
            'device' => $row['device'] ?? '',
            'os' => $row['os'] ?? '',
            'os_version' => $row['os_version'] ?? '',
            'browser_user_agent' => $row['useragent'] ?? '',
            'browser_language' => $row['browserlanguage'] ?? '',
            'referrer' => $row['referer'] ?? '',
            'url' => $row['redirect'] ?? '',
            'latency' => $row['latency'] ?? '',
            'count' => $row['count'] ?? 0,
            'fallback_feed_url_count' => $row['fallback_feed_url_count'] ?? 0,
            'pid' => $row['pid'],
            'user_id' => auth()->user()->id,
            'org_id' => $this->data['org_id'],
            'partner_id' => $this->data['partner_id'],
        ]);
    }
}
