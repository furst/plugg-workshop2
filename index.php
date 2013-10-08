<?php

require_once('view/MainView.php');
require_once('view/Home.php');
require_once('controller/Member.php');
require_once('model/MemberList.php');
require_once('model/Member.php');

$mainView = new view\MainView();
$memberList = new model\MemberList();
$home = new view\Home();

if (isset($_GET['deleteMember'])) {
    $member = new controller\Member();
    $member->deleteMember($_GET['deleteMember']);
}

$mainView->title('Glada piraten')->header();

$home->render();

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'addMember':
            $command = new controller\Member();
            $command->addMember();
            break;

        case 'listMembers':
            $command = new controller\Member();
            $command->smallList();
            break;

        case 'list':
            $command = '';
            break;
    }
}

if (isset($_GET['viewMember'])) {
    $member = new controller\Member();
    $member->singleMember($_GET['viewMember']);
}

if (isset($_GET['editMember'])) {
    $member = new controller\Member();
    $member->editMember($_GET['editMember']);
}

$mainView->footer();
