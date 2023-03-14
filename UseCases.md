# Use Cases

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
