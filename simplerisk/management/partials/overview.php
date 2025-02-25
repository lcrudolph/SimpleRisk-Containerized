<?php
// Include required functions file
require_once(realpath(__DIR__ . '/../../includes/functions.php'));
require_once(realpath(__DIR__ . '/../../includes/authenticate.php'));
require_once(realpath(__DIR__ . '/../../includes/display.php'));
require_once(realpath(__DIR__ . '/../../includes/alerts.php'));
require_once(realpath(__DIR__ . '/../../includes/permissions.php'));
require_once(realpath(__DIR__ . '/../../vendor/autoload.php'));

// Include Laminas Escaper for HTML Output Encoding
$escaper = new Laminas\Escaper\Escaper('utf-8');

// Add various security headers
add_security_headers();

if (!isset($_SESSION))
{
    // Session handler is database
    if (USE_DATABASE_FOR_SESSIONS == "true")
    {
        session_set_save_handler('sess_open', 'sess_close', 'sess_read', 'sess_write', 'sess_destroy', 'sess_gc');
    }

    // Start the session
    session_set_cookie_params(0, '/', '', isset($_SERVER["HTTPS"]), true);

    session_name('SimpleRisk');
    session_start();
}

// Include the language file
require_once(language_file());
global $lang;

csrf_init();

// Check for session timeout or renegotiation
session_check();

// Check if access is authorized
if (!isset($_SESSION["access"]) || $_SESSION["access"] != "1")
{
  header("Location: ../../index.php");
  exit(0);
}

// Enforce that the user has access to risk management
enforce_permission("riskmanagement");

?>
        
    <div class="row-fluid">
        <div class="risk-session overview clearfix">
            <div class="row-fluid">
                <?php view_top_table($id, $calculated_risk, $subject, $status, true, $mitigation_percent, $display_risk); ?>
            </div>
            
            <!-- Risk soring form -->
            <div class="row-fluid">
                <?php
                    include(realpath(__DIR__ . '/score.php'));
                ?>
            </div>
            
            <!-- Show visualization of risk score -->
            <div class="row-fluid">
                <?php
                    include(realpath(__DIR__ . '/score-overtime.php'));
                ?>
            </div>
        </div>
    </div>
