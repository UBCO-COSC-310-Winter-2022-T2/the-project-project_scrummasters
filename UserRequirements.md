# User Requirements

## Description

Our project is a Discord Clone. This will be a web based application to facilitate live messaging and collaboration. There will be servers, where people can join via a shared link. Users will be able to form a group chat, which users can only join if added by another user. Users will be able to direct messaging, creating a private chat between only two users. Servers, group chats and private chats can be created by any user at any time. The creator of the server is able to kick people out or delete the entire server. Users will be able to add friends and check their activity status. Users will also be able to set their own activity status.

## Requirements

### User:

1. Register a new account
2. Login to account
3. Recover password
4. Edit account information
5. Join Servers
6. Invite to Servers
7. Create Servers
8. Chat within servers
9. Users can leave servers
10. Send a direct message
11. Reply to other’s messages
12. Mention other users
13. Add friends
14. Remove Friend
15. Admins are able to remove users from servers
16. Accept friend request

### Functional: 

1. Host servers
2. View active servers
3. Direct messaging
4. Login with proper authorization
5. Allow password recovery
6. Store user accounts
7. Edit account information (Profile pictures, email, password, username, etc.)
8. Show activity status
9. Store friendlist
10. Support Group chats
11. Send notifications to users
12. Remove users from server
13. Delete the server

### Non-functional: 

1. web-based application
2. Relational database (Postgres)
3. HTML, CSS, JavaScript, jQuery, React
4. Data privacy
5. Consistent maintenance
6. Only one instance of a server
7. Dockerization

## Use Cases

```text
Use Case 1. Create an Account
    Primary actor: User
    Description: Allows user to create an account 
    Pre-condition: User does not have account
    Post-condition: User has account

Main scenario:
    1. User inputs username, email address, and password
    2. System sends confirmation email
    3. User confirms account creation
    4. Account is created

Extensions:
    1.1 Invalid entry
        1.1.1 If the user enters invalid info into any field, that field is highlighted and the user is prompted to fix it before continuing
    3.1 Account not confirmed
        3.1.1 If the user doesn't confirm account creation within one hour of the email being sent than the account creation expires and the user must restart
```

```text
Use Case 2. Login to Account
    Primary actor: User
    Description: Allows user to login to account
    Pre-condition: User has account
    Post-condition: User is logged in to account

Main scenario:
    1. User enters username and password
    2. Username and password are verified with system
    3. User is signed in to account

Extensions:
    2.1 Username not in system
        2.1.1 If the username is not in the system, the user is prompted to re-enter username or create new account (Case 1)
    2.2 Username and password don't match
        2.2.1 If the username and password don't match, the user is prompted to re-enter their password
    2.3 Incorrect password more than three times
        2.3.1 If the user attempts to input an incorrect password more than three times, they are locked out of signing in for one hour
    2.4 Forgot password
        2.4.1 If the user selects forgot password than they are routed to the password recovery process (Case 3)
```

```text
Use Case 3. Recover Password
    Primary actor: User
    Description: Allows user to recover their password
    Pre-condition: User has selected forgot password (Case 2 extension 2.4)
    Post-condition: User is logged in with new password

Main scenario:
    1. User enters email address associated with their account
    2. The system emails the user a link to reset password
    3. User follows link and types in new password

Extensions:
    2.1 Link Expires
        2.1.1 If the user doesn't use the link within one hour of the email being sent than the password recovery expires and the user must restart the process
    3.1 Invalid password
        3.1.1 If the user enters an invalid password, they are prompted to fix it before continuing
```

```text
Use Case 4. Edit Account Information
    Primary actor: User
    Description: Allows user to edit their account 
    Pre-condition: User is logged in (Case 2)
    Post-condition: User's account info is changed

Main scenario:
    1. User opts to change account info
    2. User selects catagory to edit
    3. User enters new info in catagory
    4. User is prompted to confirm changes before continuuing

Extensions:
    3.1 Invalid entry
        1.1.1 If the user enters invalid info, they are prompted to fix it before continuing
    3.2 Cancel changes
        3.2.1 If the user chooses cancel changes than they are returned to the account editor menu and the catagory is unchanged
    4.1 User doesn't confirm changes
        4.1.1 If the user chooses not to confirm changes, they are returned to step 3: enter info
```

```text
Use Case 5: Join a server
    Primary actor: User
    Description: Allow users to join a server
    Pre-condition: The user must be logged in
    Post-condition: The user has successfully joined a server

Main Scenario:
    1. User navigates to the server list
    2. User searches for the desired server
    3. User selects the desired server
    4. User is prompted to join the server
    5. User joins the server
```

```text
Use Case 6: Invite to server
    Primary actor: User
    Description: Invite other users to join a server
    Pre-condition: The user must be logged in and joined the server they want to send an invite for
    Post-condition: The user sends a valid invite to another user

Main Scenario:
    1. User navigates to the “invite to server” option in the server they want to send an invite for
    2. User enters a valid username of someone they want to invite to the server
    3. User selects on the desired user they want to send an invite to
    4. User successfully sends an invite to the desired user
```

```text
Use Case 7: Create a server
    Primary actor: User
    Description: User is able to create a server
    Pre-condition: The user is logged in
    Post-condition: The successfully creates a server

Main Scenario:
    1. User navigates to the “Create a server” option and selects it
    2. User is prompted to enter a server name
    3. User enters a server name
    4. User selects the option to create the server
    5. User successfully creates the server

Extensions:
    3.1 Empty Server Name
        3.1.1 If a user does not enter a server name, they will not be able to create one until they do
```

```text
Use Case 8: Chat Within Servers
    Primary Actor: User
    Description: Users can send a message within a server
    Pre-condition: The user must be logged in, have already joined the server they want to send a message on, and are currently on the server they want to send a message on
    Post-condition: The user successfully sends a message on the server

Main Scenario:
    1. User navigates to the input field in the server to send a message
    2. User enters a message
    3. User navigates to the option to send the message and selects it
    4. User sends a message to the server

Extensions:
    2.1 Empty Message
        2.1.1 If the user has not entered anything in the input field, they will be unable to send a message until they do so
```

```text
Use Case 9. Leave servers
    Primary actor: User
    Description: Allow users to leave a server
    Pre-condition: The user must be part of a current server
    Post-condition: The user can no longer access the messages from the specific server

Main scenario:
    1. User opens the website
    2. The user logs into their account
    3. The user selects the server they want to leave
    4. The user opens server options
    5. The user selects the "leave server button"
    6. The is notified that they have left the server
    7. The server is no longer accessible by the user

Extensions:
    2.1 Credentials error
        2.1.1 The user and password don't match to an account that is currently registered
```

```text
Use Case 10. Send direct message
    Primary actor: User
    Description: Allow users to send a private message to someone in their friendlist
    Pre-condition: The user must have the desired receiver in their friendlist
    Post-condition: A chat message will be sent to the conversation between the users

Main scenario:
    1. User opens the website
    2. The user logs into their account
    3. The user opens their friendlist
    4. The user selects a friend from the list
    5. The user types a message
    6. The chat is now updated with the new message and both users are able to access it

Extensions:
    2.1 Credentials error
        2.1.1 The user and password don't match to an account that is currently registered
```

```text
Use Case 11. Reply to other’s messages
    Primary actor: User
    Description: Allow users to reply to a specific message in the chat by selecting it
    Pre-condition: An instance of the chat must be open with at least one message
    Post-condition: The message sent by the user has an embedded copy of the message that is being replied to

Main scenario:
    1. User opens the website
    2. The user logs into their account
    3. The user opens an instance of a chat (Can be server chat, group chat or private chat)
    4. The user selects a message in the chat and selects the reply option
    5. The user types and sends the reply
    6. The final message sent by the user has an embedded copy of the initial message

Extensions:
    2.1 Credentials error
        2.1.1 The user and password don't match to an account that is currently registered
```

```text
Use Case 12. Mention other users
    Primary actor: User
    Description: Allow users to mention a specific member of the chat in the message
    Pre-condition: The user must be in a group chat or in a server
    Post-condition: The user being mentioned gets a different notification of this message

Main scenario:
    1. User opens the website
    2. The user logs into their account
    3. The user opens an instance of a chat (Can be server chat or group chat)
    4. The user writes in the message "@" followed by the username of the desired person to be mentioned
    5. The user sends the message
    6. The mentioned user will receive a specific notification to know that the message is directed to them

Extensions:
    2.1 Credentials error
        2.1.1 The user and password don't match to an account that is currently registered
    4.1 no user found
        4.1.1 There is no user in the chat with that username
```

```text
Use case 13. Add friends
    Primary Actor: User
    Description: User must be able to add friends to their friend list
    Pre-condition: the user must be logged in and must know the name of the person that they want to add
    Post condition: another user is added to the friend list
Main Scenario:
    1. The user opens the search bar and writes the user’s name that they want to add to their friend list
    2. The user sends a friend request to user 2
    3. user 2 approves the friend request
    4. user 2 is added to the friend list of user 1
Extensions:
    4.1 No user found
        4.1.2 A user with that username does not exist
```

```text
Use Case 14. Remove friend
    Primary Actor: User
    Description: the user must be able to remove other users from their friend list
    Pre-condition: the user must be logged in and knows the name of the user that they want to remove
    Post-condition: The desired user is removed from the friend list
Main Scenario:
    1. The user opens the friend list
    2. The user selects the other user (user 2) whom they want to remove from the friend list
    3. The user removes user 2 from the friend list
```

```text
Use Case 15. Remove users from servers
    Primary actor: Admin
    Description: The admin of a server must be able to remove other users from the server
    Pre-condition: The admin must have a server with registered users in it
    Post-condition: The desired user is removed from the server
Main Scenario:
    1. The admin must log in into the system (as an admin)
    2. The admin selects the server from which he/she wants to remove a user
    3. The admin selects the user that he/she wants to remove
    4. The admin removes the desired user
Extensions
    2.1 Credentials error
        2.1.1 The user and password don't match to an account that is currently registered
```

```text
Use Case 16. Accept friend request
    Primary Actor: User
    Description: Allows the user to accept friend requests that are sent to him/her
    Pre-condition: the user is logged in and another user has sent a friend request previously
    Post-condition: a new user is added to the friend list
Main Scenario:
    1. The user navigates to the friend request page
    2. The user presses appropriate button to accept (or decline) friend request
    3. After accepting, a new user is added to the friend list
Extensions:
    5.1 No friend request available
        5.1.1 No friend requests have been sent previously, so there is nothing to accept or decline
```
