<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Subcategory;

class SubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subcategories = [

            /* Academies */
          [
            'category_id' => 1,
            'name' => 'Dance & music',
            'slug' => Str::slug('Dance & music'),
          ], 
          [
            'category_id' => 1,
            'name' => 'School',
            'slug' => Str::slug('School'),
          ], 
          [
            'category_id' => 1,
            'name' => 'Tecnology',
            'slug' => Str::slug('Tecnology'),
          ], 

            /* Administration & Laws */ 
          [
            'category_id' => 2,
            'name' => 'Administration',
            'slug' => Str::slug('Admninistration'),
          ],
          [
            'category_id' => 2,
            'name' => 'Laws',
            'slug' => Str::slug('Laws'),
          ],

            /* Cars Area */
          [
            'category_id' => 3,
            'name' => 'Auto Parts',
            'slug' => Str::slug('Auto Parts'),
          ], 
          [
            'category_id' => 3,
            'name' => 'Body Shop',
            'slug' => Str::slug('Body Shop'),
          ],
          [
            'category_id' => 3,
            'name' => 'Dealers',
            'slug' => Str::slug('Dealers'),
          ],
          [
            'category_id' => 3,
            'name' => 'Interior Uphoistery',
            'slug' => Str::slug('Interior Uphoistery'),
          ],
          [
            'category_id' => 3,
            'name' => 'Mechanics',
            'slug' => Str::slug('Mechanics'),
          ],

             /* Chef */ 
          [
            'category_id' => 4,
            'name' => 'Chef',
            'slug' => Str::slug('Chef'),
          ],

             /* Construction & Remodeling */ 

          [
            'category_id' => 5,
            'name' => 'Air Condiotioner',
            'slug' => Str::slug('Air Condiotioner'),
          ],
          [
            'category_id' => 5,
            'name' => 'Carpentry',
            'slug' => Str::slug('CCarpentry'),
          ],
          [
            'category_id' => 5,
            'name' => 'Concrete',
            'slug' => Str::slug('Concrete'),
          ],
          [
            'category_id' => 5,
            'name' => 'Electric',
            'slug' => Str::slug('Electric'),
          ],
          [
            'category_id' => 5,
            'name' => 'Drywall & Finish',
            'slug' => Str::slug('Drywall & Finish'),
          ],
          [
            'category_id' => 5,
            'name' => 'Floors',
            'slug' => Str::slug('Floors'),
          ],
          [
            'category_id' => 5,
            'name' => 'General Contactor',
            'slug' => Str::slug('General Contractor'),
          ],
          [
            'category_id' => 5,
            'name' => 'Handyman',
            'slug' => Str::slug('Handyman'),
          ],
          [
            'category_id' => 5,
            'name' => 'Inspectors',
            'slug' => Str::slug('Inspectors'),
          ],
          [
            'category_id' => 5,
            'name' => 'Project Manager',
            'slug' => Str::slug('Project Manager'),
          ],
          [
            'category_id' => 5,
            'name' => 'Landscape',
            'slug' => Str::slug('Landscape'),
          ],
          [
            'category_id' => 5,
            'name' => 'Paint',
            'slug' => Str::slug('Paint'),
          ],
          [
            'category_id' => 5,
            'name' => 'Plumbing',
            'slug' => Str::slug('Plumbing'),
          ],
          [
            'category_id' => 5,
            'name' => 'Roof',
            'slug' => Str::slug('Roof'),
          ],

          /* Computers & Electronics */ 
          [
            'category_id' => 6,
            'name' => 'Computers',
            'slug' => Str::slug('Computers'),
          ],
          [
            'category_id' => 6,
            'name' => 'Phone & Tablets',
            'slug' => Str::slug('Phone & Tablets'),
          ],
          [
            'category_id' => 6,
            'name' => 'Tv & Sounds',
            'slug' => Str::slug('Tv & Sounds'),
          ],

          /* Event & Party */ 
          [
            'category_id' => 7,
            'name' => 'Events',
            'slug' => Str::slug('Events'),
          ],
          [
            'category_id' => 7,
            'name' => 'Party',
            'slug' => Str::slug('Party'),
          ],

          /* Fashion & Aesthetic */
          [
            'category_id' => 8,
            'name' => 'Facial Cleansing',
            'slug' => Str::slug('Facial Cleansing'),
          ],
          [
            'category_id' => 8,
            'name' => 'Fashion',
            'slug' => Str::slug('Fashion'),
          ],
          [
            'category_id' => 8,
            'name' => 'Makeup',
            'slug' => Str::slug('Makeup'),
          ],
          [
            'category_id' => 8,
            'name' => 'Massage',
            'slug' => Str::slug('Massage'),
          ],
          [
            'category_id' => 8,
            'name' => 'Phisiotherapy',
            'slug' => Str::slug('Phisiotherapy'),
          ],

          /* Insurance Agents*/ 
          [
            'category_id' => 9,
            'name' => 'Insurance Agencies',
            'slug' => Str::slug('Insurance Agencies'),
          ],
          [
            'category_id' => 9,
            'name' => 'Cars Insurance',
            'slug' => Str::slug('Cars Insurance'),
          ],
          [
            'category_id' => 9,
            'name' => 'Health Insurance',
            'slug' => Str::slug('Health Insurance'),
          ],

          /* Marketing & Developers */
          [
            'category_id' => 10,
            'name' => 'Architectural Desing',
            'slug' => Str::slug('Architectural Desing'),
          ],
          [
            'category_id' => 10,
            'name' => 'Developers',
            'slug' => Str::slug('Developers'),
          ],
          [
            'category_id' => 10,
            'name' => 'Graphic Design',
            'slug' => Str::slug('Graphic Design'),
          ],
          [
            'category_id' => 10,
            'name' => 'Marketing Digital',
            'slug' => Str::slug('Marketing Digital'),
          ],

          /* Real State Agent */
          [
            'category_id' => 11,
            'name' => 'Real State Agent',
            'slug' => Str::slug('Real state Agent'),
          ],

          /* travel & Toursim */
          [
            'category_id' => 12,
            'name' => 'Travel Agency',
            'slug' => Str::slug('Travel Agency'),
          ],
        ];

        foreach ($subcategories as $subcategory){
          Subcategory::factory(1)->create($subcategory);
        }
        
    }
}
