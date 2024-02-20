<p align="center"><a href="https://control-panel-template-kit.rogulski-robert.pl/login" target="_blank">
  <img src="https://control-panel-template-kit.rogulski-robert.pl/images/logo-ControlPanel.png" width="300" alt="Control Panel Template Kit Logo"></a></p>

## Control Panel Template Kit

Control Panel Template Kit is an application based on laravel 10 framework, livewire 3 and SB Admin 2 graphic template. The main idea of the project is to be a simple admin panel with basic functionalities that can be useful in more complex projects. The project is built on several branches that separate functionalities. This way, they can be updated independently and only the ones we need can be included in a new project.

## Project Current Modules List

For now, the project has the following modules, which will be further refined over time:

- Real-time notification
- Real-time chat
- Simple file storage system
- Users management
  - With export users to PDF/XLSX
- Configuration moduls
  - Mailing configuration
  - Chat and Notification (Pusher) configuration
- Schedule work


# Current Modules

## Real-time notification module
The application allows you to generate real-time notifications. Several types of notifications can be generated:
- SUCCESS
- INFO
- WARNING
- DANGER
  
They also require the content and title of the notification.

Once sent, all logged-in users will see the sent notification in the lower right corner. 

A counter of the user's unread notifications and the 3 most recently sent notifications will also appear next to the bell icon.

You can go into the list of notifications and manually deselect the ones you already consider to have been read.


## Real-time chat module
The chat module allows communication between users of the application.

In the upper right corner there is a message icon with information about unread messages. After pressing it, we will get an abbreviated information about the messages sent to us. We can enter the entire message list view panel.

In it we have a list of all users of the application. After pressing and selecting a particular user, we can write with him. The application displays messages in real time and information when they were sent.


## Simple file storage system module
The file manager shows us how much disk space we still have available. 

It also allows you to create your own directories, delete existing ones and upload your own files (temporarily only images). 

When you hover over a file you also get information on how much it weighs and when it was added

For images, the system displays a preview instead of the basic file icon.

## Users management module
The user management module allows basic CRUD of users. 

We also have the ability to generate a PDF and XLSX file with selected users, as well as send an email with a newly generated password if the user has forgotten it.

## Mailing configuration module
The Mailing configuration module allows you to set up your own mailing from within the application by entering basic information


## Chat and Notification (Pusher) configuration module
The chat and Notification (Pusher) configuration module allows you to set up your own mailing Pusher configuration for sending notifications and chat messages in real time

## Schedule work module
The work schedule module is designed to make it easier to check the work schedule for future months for employees whose schedule lasts, for example, 12 weeks and their expiration starts from the beginning.

Thanks to this, instead of calculating by themselves which week will fall on them, e.g. April 22, and whether they can schedule a day for themselves, they can simply check in the module.

In order to create a Schedule you require:
Schedule title 
The length of the cycle in weeks
The current week of the cycle

Ex. 
- Title - Couriers
- Cycle length in weeks - 12
- Current week of the cycle - 4

At a later stage, press Edit Changes and set the schedule for each day of the week. The system will recalculate when what week occurs and tell you what work plan is today. If you start work before 8 o'clock (for illustration) it will say that it is a night shift, otherwise it will be a day shift.

# Project Future Modules And Updates Current Modules
## Ideas For Project Future Modules
- SEO
- Invoices
- Customers / Companies (For invoices)
- Small shop system
  - Items
  - Variants
  - Orders
  - Promotions
  - Categories
  - Integtrtion with payments systems like Pay-U
- Blog system
  - New Post
  - Categories
- Integration with GPT or diffrent AI Bot
- User vacation
  
## Ideas For Updates Current Modules

### Real-time chat module
- show user Profile picture instead of placeholder
 
### Simple file storage system module
- renaming a file/folder
- sending various types of files
- sorting and filtering files/folders

### Schedule work module
- Integration with API for showing holidays
- Integration with future module "user vacation"
