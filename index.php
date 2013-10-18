<?php

require_once('view/MainView.php');
require_once('view/home.php');
require_once('controller/Member.php');
require_once('controller/Boat.php');
require_once('model/MemberList.php');
require_once('model/Member.php');
require_once('view/ClientObserver.php');

/**
 * @var \view\MainView
 */
$mainView = new view\MainView();

// /**
//  * @var model\MemberList
//  */
// $memberList = new model\MemberList();

/**
 * @var view\Home
 */
$home = new view\Home();

/**
 * @var view\ClientObserver
 */
$client = new view\ClientObserver();


if ($client->wantsToDeleteMember()) {
    $member = new controller\Member();
    $member->deleteMember($client->deleteMember());
}

if ($client->wantsToDeleteBoat()) {
    $boat = new controller\Boat();
    $boat->deleteBoat($client->deleteBoat(), $client->viewMember());
}

$mainView->title('Glada piraten - medlemsregister')->header();

$home->render();

if ($client->wantsToHandleMember()) {
    switch ($client->handleMember()) {
        case 'addMember':
            $command = new controller\Member();
            $command->addMember();
            break;

        case 'listMembers':
            $command = new controller\Member();
            $command->smallList();
            break;

        case 'listFullMembers':
            $command = new controller\Member();
            $command->bigList();
            break;
    }
}

if ($client->wantsToAddBoat()) {
    $boat = new controller\Boat();
    $boat->addBoat();
}

if ($client->wantsToEditBoat()) {
    $boat = new controller\Boat();
    $boat->editBoat($client->editBoat());
}

elseif ($client->wantsToViewMember()) {
    $member = new controller\Member();
    $member->singleMember($client->viewMember());
}

if ($client->wantsToEditMember()) {
    $member = new controller\Member();
    $member->editMember($client->editMember());
}

$mainView->footer();