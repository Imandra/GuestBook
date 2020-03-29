<?php

/**
 * Class GuestBookController
 */
class GuestBookController
{
    /**
     *
     */
    public function actionIndex ()
    {
        $view = new View();
        $view->display('header.php');
        $view->display('form.php');
        $items = GuestBookModel::find('id', 'DESC', '5');
        $view->items = $items;
        $view->display('guestbook.php');
        $view->display('footer.php');
    }

    /**
     *
     */
    public function actionAdd ()
    {
        if (!empty($_POST['name']) && !empty($_POST['body']) && !empty($_POST['action']) && $_POST['action'] == "Add") {
           $guestbook = new GuestBookModel();
           $guestbook->name = $_POST['name'];
           $guestbook->body = $_POST['body'];
           $guestbook->dtime = date('Y-m-d H:i:s');
           $guestbook->save();
        }
        $items = GuestBookModel::find('id', 'DESC', '5');
        $view = new View();
        $view->items = $items;
        $view->display('guestbook.php');
    }
}