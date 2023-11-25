<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration - Step 2</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/worker/workerreg.css">
</head>
<body>
<div class="container">
    <h1>Step 2: Labor Skills</h1>
    <form action="<?=ROOT?>/home/workerregthree" method="POST" id="skillForm">
        <div id="skillsContainer">
            <!-- Skill 1 -->
            <div class="skill">
                <div class="form-group">
                    <label class="label" for="skill1">Skill:</label>
                    <input class="input" type="text" id="skill1" name="skills[0][skill]" >
                </div>
                <div class="form-group">
                    <label class="label" for="description1">Description:</label>
                    <textarea class="input" id="description1" name="skills[0][description]" ></textarea>
                </div>
                <div class="form-group">
                    <label class="label" for="experience1">Experience:</label>
                    <input class="input" type="text" id="experience1" name="skills[0][experience]" >
                </div>
            </div>
        </div>
        <button class="button" type="button" id="addSkill">Add Skill</button>
        <button class="button" type="submit">Next</button>
        <a href="<?= ROOT ?>/home/workerreg" class="active"><button class="button" type="button">Back</button></a>
    </form>
</div>

<script>
    // Counter for tracking the number of skills
    let skillCounter = 1;

    // Function to add a new skill section
    function addSkill() {
        skillCounter++;
        const skillContainer = document.getElementById('skillsContainer');

        const newSkill = document.createElement('div');
        newSkill.className = 'skill';

        newSkill.innerHTML = `
                <div class="form-group">
                    <label class="label" for="skill${skillCounter}">Skill:</label>
                    <input class="input" type="text" id="skill${skillCounter}" name="skills[${skillCounter - 1}][skill]" required>
                </div>
                <div class="form-group">
                    <label class="label" for="description${skillCounter}">Description:</label>
                    <textarea class="input" id="description${skillCounter}" name="skills[${skillCounter - 1}][description]" required></textarea>
                </div>
                <div class="form-group">
                    <label class="label" for="experience${skillCounter}">Experience:</label>
                    <input class="input" type="text" id="experience${skillCounter}" name="skills[${skillCounter - 1}][experience]" required>
                </div>
            `;

        skillContainer.appendChild(newSkill);
    }

    // Add a click event listener to the "Add Skill" button
    document.getElementById('addSkill').addEventListener('click', addSkill);
</script>
</body>
</html>
