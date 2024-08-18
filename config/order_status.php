<?php


return [
    'order_status_admin'=>[
        'pending'=>[
            'status'=>'Pending',
            'details'=> 'Your order is currently pending'
        ],
        'processed_and_ready_to_ship' =>[
            'status'=>'Processed and ready to ship',
            'details'=>'Your Package has been processed and will be deliver with out partner courier soon'

        ],
        'dropped_off'=>[
            'status'=>'Dropped off',
            'details'=>'Your package has been dropped off by the seller'
        ],
        'shipped'=>[
            'status'=>'Shipped',
            'details'=> 'Your package has arrived at our logistics facility'
        ],

        'out_for_delivery'=>[
            'status'=>'Out For Delivery',
            'details'=>'The courier will attempt to deliver your package'
        ],

        'delivered' =>[
            'status'=>'Delivered',
            'details'=>'Deliverd'
        ],

        'cancel' =>[
            'status'=>'Canceled',
            'details'=>'Canceled'
        ]

        ],

    'order_status_seller'=>[
        'pending'=>[
            'status'=>'Pending',
            'details'=> 'Your order is currently pending'
        ],
        'processed_and_ready_to_ship' =>[
            'status'=>'Processed and ready to ship',
            'details'=>'Your Package has been processed and will be deliver with out partner courier soon'
        ]



        ]
];
