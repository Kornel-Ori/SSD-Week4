<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first() ?? User::create([
            'name'     => 'Car Enthusiast',
            'email'    => 'demo@carblog.com',
            'password' => bcrypt('password123'),
        ]);

        // Remove old seeded posts to avoid duplicates
        Post::where('user_id', $user->id)->delete();

        $posts = [
            [
                'title'      => 'The 2024 Ferrari SF90 Stradale: A Hybrid Supercar Like No Other',
                'image_path' => 'https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=1200&auto=format&fit=crop',
                'description' => "When Ferrari unveiled the SF90 Stradale, the automotive world collectively held its breath. Here was a car that combined the raw, screaming passion of a traditional Ferrari V8 with the futuristic efficiency of a plug-in hybrid system — and it pulled it off brilliantly.\n\nUnder the bonnet sits a 4.0-litre twin-turbocharged V8 producing 769bhp on its own. Add three electric motors and the total output climbs to a staggering 986bhp. The result? 0-60mph in just 2.5 seconds and a top speed of 211mph.\n\nBut what makes the SF90 truly special isn't just the numbers. It's the way it communicates with the driver. The steering is razor-sharp, the carbon ceramic brakes are confidence-inspiring, and the hybrid system seamlessly fills in torque at low revs.\n\nIn full electric mode it can travel up to 15 miles silently — surreal in a Ferrari. Flick it into Performance or Qualify mode and the full fury of the powertrain is unleashed.\n\nAt around £400,000 it's not cheap, but as a showcase of what Ferrari is capable of in the modern era, the SF90 Stradale is nothing short of breathtaking.",
            ],
            [
                'title'      => 'Top 5 Classic Cars Worth Investing In Right Now',
                'image_path' => 'https://images.unsplash.com/photo-1566008885218-90abf9200ddb?w=1200&auto=format&fit=crop',
                'description' => "The classic car market has long been seen as an alternative investment. Unlike stocks and shares, a well-chosen classic can be driven, enjoyed, and admired — all while appreciating in value.\n\n1. PORSCHE 911 (AIR-COOLED, 1964-1998)\nValues have climbed steadily for years. The 993-generation is widely regarded as the last true air-cooled 911 and commands a premium.\n\n2. FORD ESCORT RS2000 MK2\nA quintessential British classic with strong club support. Genuine examples in good condition are becoming increasingly rare.\n\n3. JAGUAR E-TYPE SERIES 1\nThe E-Type needs no introduction. Series 1 cars in good condition regularly fetch six figures at auction.\n\n4. BMW E30 M3\nHomologated for touring car racing in the 1980s, the E30 M3 is now a bona fide icon.\n\n5. VOLKSWAGEN GOLF GTI MK1\nThe car that invented the hot hatch. Original, unmodified Mk1 GTIs are now genuinely scarce.",
            ],
            [
                'title'      => 'Electric vs Petrol: Which Is Right for You in 2024?',
                'image_path' => 'https://images.unsplash.com/photo-1593941707882-a5bba14938c7?w=1200&auto=format&fit=crop',
                'description' => "The debate between electric and petrol cars has never been more relevant. With more electric models on sale than ever, many drivers are seriously considering making the switch.\n\nTHE CASE FOR ELECTRIC\nRunning costs are significantly lower. Electricity is cheaper per mile than petrol, and servicing is simpler with fewer moving parts. Instant torque delivery makes even modest EVs feel swift.\n\nFor anyone who charges at home overnight, range anxiety largely disappears. If your daily commute is under 100 miles a modern EV will handle it effortlessly.\n\nTHE CASE FOR PETROL\nLong distance driving is still more straightforward in a petrol car. Filling up takes five minutes, and petrol stations are everywhere.\n\nUpfront purchase prices for EVs remain higher, though the gap is closing. And if you have no off-street parking, home charging simply isn't an option.\n\nTHE VERDICT\nFor most urban drivers with a driveway, an EV makes compelling sense. For high-mileage drivers, a modern petrol or hybrid remains the pragmatic choice.",
            ],
            [
                'title'      => 'A Weekend With the Porsche 911 GT3: Track Day Ready',
                'image_path' => 'https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=1200&auto=format&fit=crop',
                'description' => "There are fast cars, and then there is the Porsche 911 GT3. Few modern cars blur the line between road car and racing car quite so effectively.\n\nThe 4.0-litre naturally aspirated flat-six is the centrepiece. In an era of turbocharging, Porsche has stubbornly stuck with a free-breathing engine that revs to 9,000rpm. The noise alone is worth the price of admission.\n\nOn the road, the GT3 is surprisingly liveable. The ride is firm but not punishing, the visibility is excellent, and the PDK gearbox swaps ratios with telepathic speed.\n\nOn track, it transforms. The downforce from the rear wing becomes tangible above 80mph, braking distances seem impossibly short, and the chassis communicates everything with extraordinary clarity.\n\nAt £140,000 it sits in rare air financially. But as an uncompromised driving machine, the 911 GT3 justifies every penny.",
            ],
            [
                'title'      => "Beginner's Guide to Car Maintenance: 5 Things Every Driver Should Know",
                'image_path' => 'https://images.unsplash.com/photo-1530046339160-ce3e530c7d2f?w=1200&auto=format&fit=crop',
                'description' => "You don't need to be a mechanic to keep your car in good shape. A few simple checks can save you money, prevent breakdowns, and keep your car running safely.\n\n1. CHECK YOUR TYRE PRESSURE MONTHLY\nUnderinflated tyres wear unevenly, reduce fuel economy, and compromise handling. Check the correct pressure in your owner's manual.\n\n2. CHECK YOUR OIL LEVEL EVERY FEW WEEKS\nLow oil is one of the most common causes of engine damage. Use the dipstick with the engine cold and top up if needed.\n\n3. TOP UP YOUR SCREENWASH\nRunning out of screenwash in winter can be genuinely dangerous. Keep a bottle in the boot.\n\n4. KNOW WHEN YOUR MOT AND SERVICE ARE DUE\nSet a reminder on your phone. Driving without a valid MOT is illegal and invalidates your insurance.\n\n5. LISTEN TO YOUR CAR\nUnusual noises are your car telling you something is wrong. Catching a problem early is almost always cheaper than waiting.",
            ],
        ];

        foreach ($posts as $data) {
            Post::create([
                'title'       => $data['title'],
                'description' => $data['description'],
                'image_path'  => $data['image_path'],
                'user_id'     => $user->id,
            ]);
        }

        $this->command->info('5 car blog posts with images seeded successfully!');
    }
}
