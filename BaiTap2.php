<?php
$courses = ["HTML", "CSS", "JavaScript", "PHP"];
?>

<ul>
    <?php foreach ($courses as $course): ?>
        <li>
            <?php echo $course; ?>
            
            <?php if ($course === "PHP"): ?>
                - Đang học
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>