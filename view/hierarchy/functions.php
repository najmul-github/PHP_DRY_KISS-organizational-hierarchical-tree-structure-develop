<?php

function buildHierarchyTree($employees, $managerId = null) {
    $subordinates = getSubordinates($employees, $managerId);

    if (!empty($subordinates)) {
        echo '<ul>';
        foreach ($subordinates as $employee) {
            echo '<li>';
            echo '<div>' . $employee['name'] . '</div>';
            buildHierarchyTree($employees, $employee['id']);
            echo '</li>';
        }
        echo '</ul>';
    }
}

function getSubordinates($employees, $managerId) {
    $subordinates = [];
    foreach ($employees as $employee) {
        if ($employee['manager_id'] == $managerId) {
            $subordinates[] = $employee;
        }
    }
    return $subordinates;
}
