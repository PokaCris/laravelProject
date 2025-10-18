<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class NewController extends Controller
{
    private $news = [
        [
            'id' => 1,
            'title' => 'Amazon surprises Wall Street with a blowout holiday quarter',
            'content' => 'The company also reveals it now has over 150 million paid Prime members.
        It\'s OK if you got motion sickness from following Amazon\'s earnings reports over the past year. Case in point: The e-commerce heavyweight\'s profits crashed in the second and third quarters of 2019, following a heady string of record earnings. And just when profits seemed to be on their way down, they\'re right back up again in the fourth quarter, just shy of the company\'s all-time quarterly record.
        Amazon\'s stock jumped on the better-than-expected earnings and sales for the all-important holiday quarter, which Amazon reported Thursday afternoon. Shares surged 11% in after-hours trading.
        To add to the good news, the company revealed it now has over 150 million paid Prime members globally, up from over 100 million, which it reported in April 2018.
        Amazon\'s latest quarterly results come as Wall Street continues to be heavily focused on the company\'s revenue growth as a primary metric to judge its success. While that metric has been a source of strength for Amazon for years, it\'s become harder for the company to maintain hefty percentage gains since it\'s now so big, even as it\'s pushed into new fields like health care, robotics, groceries and film production.
        Sales growth in 2017 and 2018 was just above 30% -- a huge figure for such a large company. For 2019, Amazon said Thursday it hit sales growth of 20%, which is low compared to Amazon\'s past years but well ahead of most other retailers.
        Amazon has worked to boost sales by spending billions of dollars shifting its Amazon Prime shipping program in the US from two days to just one. While expensive, that effort helped Amazon post its best revenue growth in a year, at 24%, during the third quarter.'
        ],
        [
            'id' => 2,
            'title' => 'Nintendo says we won\'t get new Switch model in 2020',
            'content' => 'The company has "no plans" to release another version of the console, its president says.
        Even though Sony\'s PS5 and Microsoft\'s Xbox Series X are out in 2020, Nintendo won\'t be releasing a fresh Switch model to compete. Nintendo boss Shuntaro Furukawa told investors that the company has "no plans" to release another version of its hybrid console this year.
        The Japanese company will instead focus on the existing models -- the Switch and the cheaper, portable-only Switch Lite -- which have sold a combined 52.48 million units and which overtook the Super Nintendo Entertainment System (SNES) in lifetime sales during the last quarter.
        Even though we won\'t see a major console revision, there\'s a special version coming out to celebrate the arrival of Animal Crossing: New Horizons in March.'
        ],
        [
            'id' => 3,
            'title' => 'The best home security cameras of CES 2020',
            'content' => 'There are a lot of new cameras at this year\'s tech show and we\'re gonna detail the coolest ones right here.
        
        1 of 10
        Abode Outdoor/Indoor Smart Camera
        The Abode Outdoor/Indoor Smart Camera can be either hardwired or powered by an adapter. 
        Tyler Lizenby/CNET

        2 of 10
        Arlo Pro 3 Floodlight Cam
        The Arlo Pro 3 Floodlight Camera runs on a rechargeable battery. 

        3 of 10
        Blue by ADT Doorbell Camera
        This smart doorbell costs $199 and is an inaugural product of ADT\'s new DIY brand, Blue by ADT.

        4 of 10
        Blue by ADT Indoor Camera
        Blue by ADT also introduced a $199 indoor camera.

        5 of 10
        Blue by ADT Outdoor Camera
        And a $199 outdoor camera.

        7 of 10
        D-Link Full HD Indoor and Outdoor Pro Wi-Fi Camera
        The D-Link Full HD Indoor and Outdoor Pro Wi-Fi Camera has person detection and will be available this summer for $120. 

        8 of 10
        Eve Cam
        The Eve Cam works with HomeKit Secure Video, a service available through the iOS Home app that uses your Apple TV or Apple HomePod to analyze your camera\'s video footage locally. 

        9 of 10
        Hoop Cam
        The $90 Hoop Cam has 1080p HD, person alerts and built-in storage. 

        10 of 10
        Hoop Cam Plus
        The Hoop Cam Plus costs $130 and adds in pan/tilt functionality.'
        ],
        [
            'id' => 4,
            'title' => 'Google Doodle honors gigantic civil rights moment with miniature artwork',
            'content' => 'A diorama honors the Greensboro Four and their sit-in at a Woolworth\'s lunch counter.
        Google is honoring the 60th anniversary of a milestone in the civil rights movement the Greensboro sit-ins with a Doodle featuring a diorama of the Greensboro Four. 
        On Feb. 1, 1960, four black college students, Ezell Blair Jr., David Richmond, Franklin McCain and Joseph McNeil, staged a sit-in at the segregated lunch counter of a Woolworth\'s in Greensboro, North Carolina. Inspired by the nonviolent-protest techniques of Mohandas K. Gandhi, also known as Mahatma Gandhi, the four were motivated to protest after the 1955 murder of 14-year-old Emmett Till. Eventually, tens of thousands of people joined sit-ins that grew out of that first event, generating extensive media coverage that helped push the civil rights movement forward.
        "Today\'s Doodle diorama not only pays homage to the sit-in, but also to everything that came as a result: changes in our country to make it more possible for all Americans no matter their race, color or creed to live to their full potential," said Karen Collins, the artist behind the diorama.   
        Based in Compton, California, Collins is founder of the African American Miniature Museum, which features dioramas representing black history in the US. Saturday is also the start of Black History Month in the US'
        ]
    ];

    public function index()
    {
        $newsFromDB = DB::table('news')->get();
        
        if ($newsFromDB->count() > 0) {
            $newsList = [];
            foreach ($newsFromDB as $news) {
                $newsList[] = [
                    'id' => $news->id,
                    'title' => $news->header,
                    'content' => $news->article,
                    'image' => $news->image
                ];
            }
            return view('newList', ['newsList' => $newsList]);
        }
        
        return view('newList', ['newsList' => $this->news]);
    }

    public function show($id)
    {
        $newsFromDB = DB::table('news')->where('id', (int)$id)->first();
        
        if ($newsFromDB) {
            return view('newView', [
                'newsItem' => [
                    'id' => $newsFromDB->id,
                    'title' => $newsFromDB->header,
                    'content' => $newsFromDB->article,
                    'image' => $newsFromDB->image
                ]
            ]);
        }

        $newsItem = collect($this->news)->firstWhere('id', (int)$id);

        if (!$newsItem) {
            abort(404);
        }

        return view('newView', ['newsItem' => $newsItem]);
    }

    public function edit($id)
    {
        $newsFromDB = DB::table('news')->where('id', (int)$id)->first();
        
        if ($newsFromDB) {
            $newsItem = [
                'id' => $newsFromDB->id,
                'title' => $newsFromDB->header,
                'content' => $newsFromDB->article,
                'image' => $newsFromDB->image
            ];
            return view('edit', ['newsItem' => $newsItem]);
        }

        $newsItem = collect($this->news)->firstWhere('id', (int)$id);

        if (!$newsItem) {
            abort(404);
        }

        return view('edit', ['newsItem' => $newsItem]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'sometimes|image|max:2048',
        ]);

        $updateData = [
            'header' => $request->input('title'),
            'article' => $request->input('content'),
            'updated_at' => now(),
        ];

        if ($request->hasFile('image')) {
            $imageData = file_get_contents($request->file('image')->getRealPath());
            $updateData['image'] = $imageData;
        }

        DB::table('news')
            ->where('id', (int)$id)
            ->update($updateData);

        return redirect()->route('news.show', $id)->with('success', 'News updated successfully!');
    }
}