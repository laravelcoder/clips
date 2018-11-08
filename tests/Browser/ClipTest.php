<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;

class ClipTest extends DuskTestCase
{

    public function testCreateClip()
    {
        $admin = \App\User::find(1);
        $clip = factory('App\Clip')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clip) {
            $browser->loginAs($admin)
                ->visit(route('admin.clips.index'))
                ->clickLink('Add new')
                ->type("title", $clip->title)
                ->type("description", $clip->description)
                ->type("notes", $clip->notes)
                ->press('Save')
                ->assertRouteIs('admin.clips.index')
                ->assertSeeIn("tr:last-child td[field-key='title']", $clip->title)
                ->logout();
        });
    }

    public function testEditClip()
    {
        $admin = \App\User::find(1);
        $clip = factory('App\Clip')->create();
        $clip2 = factory('App\Clip')->make();

        

        $this->browse(function (Browser $browser) use ($admin, $clip, $clip2) {
            $browser->loginAs($admin)
                ->visit(route('admin.clips.index'))
                ->click('tr[data-entry-id="' . $clip->id . '"] .btn-info')
                ->type("title", $clip2->title)
                ->type("description", $clip2->description)
                ->type("notes", $clip2->notes)
                ->press('Update')
                ->assertRouteIs('admin.clips.index')
                ->assertSeeIn("tr:last-child td[field-key='title']", $clip2->title)
                ->logout();
        });
    }

    public function testShowClip()
    {
        $admin = \App\User::find(1);
        $clip = factory('App\Clip')->create();

        


        $this->browse(function (Browser $browser) use ($admin, $clip) {
            $browser->loginAs($admin)
                ->visit(route('admin.clips.index'))
                ->click('tr[data-entry-id="' . $clip->id . '"] .btn-primary')
                ->assertSeeIn("td[field-key='title']", $clip->title)
                ->assertSeeIn("td[field-key='description']", $clip->description)
                ->assertSeeIn("td[field-key='notes']", $clip->notes)
                ->logout();
        });
    }

}
