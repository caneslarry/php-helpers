`

    // Example usage:
    $cache = new Cache();
    
    $cache->set('example_key', 'example_value', 10);
    
    $value = $cache->get('example_key');
    if ($value !== null) {
        echo "Value from cache: $value\n";
    } else {
        echo "Value not found in cache.\n";
    }
    
    sleep(15);
    
    $value = $cache->get('example_key');
    if ($value !== null) {
        echo "Value from cache: $value\n";
    } else {
        echo "Value not found in cache after TTL expiry.\n";
    }
`