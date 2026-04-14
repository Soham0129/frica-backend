<?php

return [
    'module_type'=>[
        'grocery', 'food', 'pharmacy', 'ecommerce','parcel','rental',
        'event_services', 'event_products'
    ],

    'event_services'=>[
        'order_status' => ['accepted' => false], // No order acceptance needed
        'order_place_to_schedule_interval' => true, // Allow scheduling of service bookings
        'add_on' => false, // No add-ons for services, unless you define custom options
        'stock' => true, // Track availability of service slots or dates
        'veg_non_veg' => false, // If not catering, this would be false, but could be used for catering services
        'unit' => false, // No unit management needed for event services
        'order_attachment' => false, // No attachment needed for services
        'always_open' => false, // Service providers have specific availability schedules
        'all_zone_service' => true, // Services available across all zones (if applicable to your platform)
        'item_available_time' => true, // Service availability based on time slots (e.g., photographer availability)
        'show_restaurant_text' => false, // Not restaurant-specific, but may apply to catering services
        'is_parcel' => false, // Not applicable for event services
        'organic' => false, // Not typically used for event services
        'cutlery' => false, // Only applicable for catering or food-related services
        'common_condition' => false, // Not needed for event services, unless special terms
        'nutrition' => false, // Could apply if offering catering services with food
        'allergy' => false, // Can be added for catering services for allergy-related information
        'basic' => false, // Not needed, can be used if defining base services for events
        'halal' => false, // Only if offering catering services (e.g., halal food options)
        'brand' => false, // Not relevant to event services
        'generic_name' => false, // Not applicable, unless you are using generic names for certain services
        'description' => 'Event services module for managing event-based service bookings and scheduling.',
        'is_rental' => false, // Services are not rental-based (unless you include something like furniture rentals)
    ],

    'event_products'=>[
        'order_status' => ['accepted' => false], // No order acceptance needed
        'order_place_to_schedule_interval' => false, // Products don't need scheduling
        'add_on' => true, // Add-ons are possible for event products (e.g., extra chairs, decorations)
        'stock' => true, // Need inventory management (e.g., furniture, décor items)
        'brand' => true, // Track brand for event products (e.g., furniture brand, décor brands)
        'generic_name' => true, // For generic products like chairs, tables, etc.
        'description' => 'Event products module for managing event-related products, tickets, and merchandise.',
        'is_rental' => true, // Event products like furniture are often rented (e.g., table rentals, chair rentals)
        'veg_non_veg' => false, // Not needed for event products unless food-related
        'nutrition' => false, // Not needed unless catering products
        'allergy' => false, // Not relevant unless food-related products
        'cutlery' => false, // Not applicable unless for catering products
        'unit' => true, // Products may require unit management (e.g., quantity of tables, chairs)
        'always_open' => false, // Products do not have "open" or "closed" status
        'show_restaurant_text' => false, // Not applicable unless for food-related products
        'is_parcel' => false, // Not applicable for event products unless handling shipping
        'organic' => false, // Not typically used for event products
    ],

    'grocery'=>[
        'order_status'=>['accepted'=>false],
        'order_place_to_schedule_interval'=>true,
        'add_on'=>false,
        'stock'=>true,
        'veg_non_veg'=>false,
        'unit'=>true,
        'order_attachment'=>false,
        'always_open'=>false,
        'all_zone_service'=>false,
        'item_available_time'=>false,
        'show_restaurant_text'=>false,
        'is_parcel'=>false,
        'organic'=>true,
        'cutlery'=>false,
        'common_condition'=>false,
        'nutrition'=>true,
        'allergy'=>true,
        'basic'=>false,
        'halal'=>true,
        'brand'=>false,
        'generic_name'=>false,
        'description'=>'In this type, You can set delivery slot start after x minutes from current time, No available time for items and has stock for items.',
        'is_rental'=>false,
    ],

    'food'=>[
        'order_status'=>['accepted'=>true],
        'order_place_to_schedule_interval'=>false,
        'add_on'=>true,
        'stock'=>false,
        'veg_non_veg'=>true,
        'unit'=>false,
        'order_attachment'=>false,
        'always_open'=>false,
        'all_zone_service'=>false,
        'item_available_time'=>true,
        'show_restaurant_text'=>true,
        'is_parcel'=>false,
        'organic'=>false,
        'cutlery'=>true,
        'common_condition'=>false,
        'nutrition'=>true,
        'allergy'=>true,
        'basic'=>false,
        'halal'=>true,
        'brand'=>false,
        'generic_name'=>false,
        'description'=>'In this type, you can set item available time, no stock management for items and has option to add add-on.',
        'is_rental'=>false,
    ],

    'pharmacy'=>[
        'order_status'=>['accepted'=>false],
        'order_place_to_schedule_interval'=>false,
        'add_on'=>false,
        'stock'=>true,
        'veg_non_veg'=>false,
        'unit'=>true,
        'order_attachment'=>true,
        'always_open'=>false,
        'all_zone_service'=>false,
        'item_available_time'=>false,
        'show_restaurant_text'=>false,
        'is_parcel'=>false,
        'organic'=>false,
        'cutlery'=>false,
        'common_condition'=>true,
        'nutrition'=>false,
        'allergy'=>false,
        'basic'=>true,
        'halal'=>false,
        'brand'=>false,
        'generic_name'=>true,
        'description'=>'In this type, Customer can upload prescription when place order, No available time for items and has stock for items.',
        'is_rental'=>false,
    ],

    'ecommerce'=>[
        'order_status'=>['accepted'=>false],
        'order_place_to_schedule_interval'=>false,
        'add_on'=>false,
        'stock'=>true,
        'veg_non_veg'=>false,
        'unit'=>true,
        'order_attachment'=>false,
        'always_open'=>true,
        'all_zone_service'=>true,
        'item_available_time'=>false,
        'show_restaurant_text'=>false,
        'is_parcel'=>false,
        'organic'=>false,
        'cutlery'=>false,
        'common_condition'=>false,
        'nutrition'=>false,
        'allergy'=>false,
        'basic'=>false,
        'halal'=>false,
        'brand'=>true,
        'generic_name'=>false,
        'description'=>'In this type, No opening and closing time for store, no available time for items and has stock for items.',
        'is_rental'=>false,
    ],

    'parcel'=>[
        'order_status'=>['accepted'=>false],
        'order_place_to_schedule_interval'=>false,
        'add_on'=>false,
        'stock'=>false,
        'veg_non_veg'=>false,
        'unit'=>false,
        'order_attachment'=>false,
        'always_open'=>true,
        'all_zone_service'=>false,
        'item_available_time'=>false,
        'show_restaurant_text'=>false,
        'is_parcel'=>true,
        'organic'=>false,
        'cutlery'=>false,
        'common_condition'=>false,
        'nutrition'=>false,
        'allergy'=>false,
        'basic'=>false,
        'halal'=>false,
        'brand'=>false,
        'generic_name'=>false,
        'description'=>'',
        'is_rental'=>false,
    ],
    'rental'=>[
        'order_status'=>['accepted'=>false],
        'order_place_to_schedule_interval'=>false,
        'add_on'=>false,
        'stock'=>false,
        'veg_non_veg'=>false,
        'unit'=>false,
        'order_attachment'=>false,
        'always_open'=>false,
        'all_zone_service'=>false,
        'item_available_time'=>false,
        'show_restaurant_text'=>false,
        'is_parcel'=>false,
        'organic'=>false,
        'cutlery'=>false,
        'common_condition'=>false,
        'nutrition'=>false,
        'allergy'=>false,
        'basic'=>false,
        'halal'=>false,
        'brand'=>false,
        'generic _name'=>false,
        'description'=>'',
        'is_rental'=>true,
    ],
];
