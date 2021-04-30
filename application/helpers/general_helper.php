<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


function setJsonResponse()
{
    header('Content-Type: application/json');
}


function returnJsonResponse($data)
{
    echo json_encode($data);
}

function getUserData($var = false)
{
    $ci = &get_instance();
    return $var ? $ci->session->userdata($var) : $ci->session->userdata();
}

function returnQueryAsJsonResponse($query)
{
    $ci = &get_instance();

    returnJsonResponse(
        $ci->db->query($query)->result()
    );
}

function loadLandingViewData($data = array())
{
    $ci = &get_instance();
    $ci->load->view('templates/landing', $data);
}

function loadDashboardViewData($data = array())
{
    $ci = &get_instance();
    $ci->load->view('templates/dashboard', $data);
}

function hasLogin()
{
    $ci = &get_instance();
    return $ci->session->userdata("personalData");
}

function destroySession()
{
    $ci = &get_instance();
    $ci->session->unset_userdata("personalData");
}

function loginRequired()
{
    if (!hasLogin()) {
        redirect(base_url("landing"));
    }
}

function sendCalmErrorMessage($message)
{
    $ci = &get_instance();
    $ci->session->set_flashdata("error", $message);
}

function sendCalmInfoMessage($message)
{
    $ci = &get_instance();
    $ci->session->set_flashdata("info", $message);
}

function sendCalmSuccessMessage($message)
{
    $ci = &get_instance();
    $ci->session->set_flashdata("success", $message);
}

function sendCalmWarningMessage($message)
{
    $ci = &get_instance();
    $ci->session->set_flashdata("warning", $message);
}

function secureThisVar($var)
{
    $ci = &get_instance();
    return $ci->db->escape($var);
}
