<?php

require_once('view/MainView.php');
require_once('view/home.php');
require_once('controller/Member.php');
require_once('model/MemberList.php');
require_once('model/Member.php');

$mainView = new view\MainView();
$home = new view\Home();
$content = $home->content();

$memberList = new model\MemberList();

if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'addMember':
            $command = new controller\Member();
            $content = $command->render();
            break;

        case 'listMembers':
            $command = new controller\Member();
            $content = $command->renderList();
            break;

        case 'list':
            $command = '';
            break;
    }
}

$mainView->title('Glada piraten')->content($content);
