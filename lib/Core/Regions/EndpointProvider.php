<?php

namespace Aliyun\Core\Regions;

class EndpointProvider
{
    private static $endpoints;

    public static function findProductDomain($regionId, $product)
    {
        if (null == $regionId || null == $product || null == self::$endpoints) {
            return;
        }

        foreach (self::$endpoints as $key => $endpoint) {
            if (in_array($regionId, $endpoint->getRegionIds())) {
                return self::findProductDomainByProduct($endpoint->getProductDomains(), $product);
            }
        }
    }

    private static function findProductDomainByProduct($productDomains, $product)
    {
        if (null == $productDomains) {
            return;
        }
        foreach ($productDomains as $key => $productDomain) {
            if ($product == $productDomain->getProductName()) {
                return $productDomain->getDomainName();
            }
        }
    }

    public static function getEndpoints()
    {
        return self::$endpoints;
    }

    public static function setEndpoints($endpoints)
    {
        self::$endpoints = $endpoints;
    }
}
