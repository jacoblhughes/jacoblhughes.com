<?php
    $main_divs = array(
        array('./certs/lead_auditor _management_systems_auditing.pdf', 'Lead Auditor Management Systems Auditing'),
        array('./certs/lead_auditor_integrated_management_systems.pdf', 'Lead Auditor Integrated Management Systems'),
        array('./certs/understanding_a_quality_management_system.pdf', 'Understanding A Quality Management System'),
        array('./certs/internal_auditing.pdf', 'ABCI Consultants Internal Auditing ISO Management Systems'),
        array('./certs/understanding_an_environmental_management.pdf', 'Understanding An Environmental Management System'),
        array('./certs/understanding_an_oh&s_management_system.pdf', 'Understanding An OH&S Management System'),
        array('./certs/free_code_camp_front_end.png', 'Free Code Camp Front End Certification'),
        array('./certs/google_digital_garage.pdf', 'Google Digital Garage Online Marketing Fundementals'),
        array('./certs/master_class_management.pdf', 'Master Certificate in Business Management'),
        array('./certs/red_cross_cert.pdf', 'Red Cross CPR/First Aid/AED'),

    );
    $index = 0;
    $files = array_slice(scandir('./certs/'), 2);
    foreach ($main_divs as $main_divs) {
        echo "<div class = 'internal_links'><a href = '$main_divs[0]'>$main_divs[1]</a></div>";
    };
    // foreach(glob($log_directory.'certs/*.*') as $file) {
    //     echo "<div class = 'internal_links'><a href = '$file'>$file</a></div>";
    //     echo "-----";
    // };

?>