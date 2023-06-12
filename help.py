import os


folder_path = "events/"
search_text = """<header>"""
replace_text = """<div class="close">
        <i class="fa fa-times" aria-hidden="true"></i>
    </div>
    <div class="sideNav">
        <ul>
            <li><a href="#">Association</a></li>
            <li><a href="../bank">Banks</a></li>
            <li><a href="../companies">Companies</a></li>
            <li><a href="../commerce">Commerce</a></li>
            <li><a href="../leaders">Leaders</a></li>
            <li><a href="../regulators">Regulators</a></li>
            <li><a href="../trade">Trade</a></li>
            <li><a href="../technology">Technology</a></li>
            <li><a href="../events">Events</a></li>
        </ul>
    </div>

    <div class="sideNavCover">

    </div>
    
    <header>"""

# Get all .php files in the folder
php_files = [file for file in os.listdir(folder_path) if file.endswith(".php")]

# Iterate through each .php file and perform the replacement
for file_name in php_files:
    file_path = os.path.join(folder_path, file_name)
    
    # Read the content of the file with the appropriate encoding
    with open(file_path, "r", encoding="utf-8") as file:
        content = file.read()
    
    # Perform the replacement
    new_content = content.replace(search_text, replace_text)
    
    # Write the updated content back to the file
    with open(file_path, "w", encoding="utf-8") as file:
        file.write(new_content)

print("Text replacement completed!")
