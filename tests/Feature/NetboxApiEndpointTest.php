<?php

namespace Tests\Unit;

use Rconfig\NetBox\Facades\NetBoxApi;
use Tests\TestCase;

class NetboxApiEndpointTest extends TestCase
{

    public function test_can_get_status_endpoint()
    {
        $response = NetBoxApi::status()->show();
        // dd($response);

        // save response to temp file
        $baseFile = 'packages/rconfig/laravel-netbox-api/tests/storage/base.json';
        $saveTmpFile = false;
        if ($saveTmpFile) {
            $tempFile = file_put_contents($baseFile, json_encode($response, JSON_PRETTY_PRINT));
        }

        $this->assertIsArray($response);
        $this->assertEquals($response, json_decode(file_get_contents($baseFile), true));
        $this->assertEquals($response['django-version'], '5.0.7');
        $this->assertEquals($response['netbox-version'], '4.0.8');
    }

    public function test_can_get_all_hardcoded_devices()
    {
        $devices =  NetBoxApi::devices()->list();
        $this->assertCount(1, $devices['results']);
    }


    public function test_can_creates_a_device_in_netbox_with_tags()
    {

        $devicenameForTest = 'netbox_device_test_1';

        $this->remove_test_device($devicenameForTest);

        $deviceData = [
            'display' => $devicenameForTest,
            'name' => $devicenameForTest,
            'device_type' => 1,
            'primary_ip' => '1.1.1.1',
            'role' => 1,
            'site' => 1,
            'tags' =>  [1, 2]
        ];

        NetBoxApi::devices()->add($deviceData);

        $params = [
            'name' => $devicenameForTest,
        ];

        $devicesResp =  NetBoxApi::devices()->list($params);

        $this->assertCount(1, $devicesResp['results']);
        $this->assertEquals($devicesResp['results'][0]['name'], $devicenameForTest);
        $this->assertEquals($devicesResp['results'][0]['tags'][0]['id'], 1);
        $this->assertEquals($devicesResp['results'][0]['tags'][1]['id'], 2);

        $this->remove_test_device($devicenameForTest);
    }

    private function remove_test_device($devicename)
    {

        $params = [
            'name' => $devicename,
        ];

        $response2 = NetBoxApi::devices()->list($params);
        if (!empty($response2['results'])) {
            $result = NetBoxApi::devices()->remove($response2['results'][0]['id']);
            $response3 = NetBoxApi::devices()->list($params);
            $this->assertEmpty($response3['results']);
        }
    }
}
