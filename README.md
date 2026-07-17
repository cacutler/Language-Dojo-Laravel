# Lanaguage Dojo

This is a full-stack web-application written with the Laravel framework to help people learn different languages like Korean, Japanese, Chinese, Spanish, and English through the use of different methods and strategies, such as vocabulary, grammar rules, alphabets, and examples using quotes from various sources of entertainment.

## Features

- Allow users to create an account and sign in
- Allow users to choose what languages to learn
- Allow users to track progress
- Allow users to add their own examples
- Allow admin users to add new language courses as well as see and edit existing courses
- Allow admin users to elevate users to admin users

## Database Design

**Users**

- ID (UUID; primary key) - required
- First Name (string) - nullable
- Last Name (string) - nullable
- Username (string) - required; unique
- Email (string) - required; unique
- Phone Number (string) - nullable
- Password (string) - required
- Native Language (string) - required
- Is Admin (boolean) - default to false
- Created At (timestamp)
- Updated At (timestamp)

**Languages**

- ID (UUID; primary key) - required
- Name (string) - required
- Code (string) - required

**Courses**

- ID (UUID; primary key) - required
- Language ID (int; foreign key) - required
- Title (string) - required
- Description (text) - nullable
- Created At (timestamp)
- Updated At (timestamp)

**Grammar Rules**

- ID (UUID; primary key) - required
- Course ID (UUID; foreign key) - required
- Title (string) - required
- Explanation (text) - nullable
- Difficulty Level (enum) - required
- Created At (timestamp)
- Updated At (timestamp)

**System Examples**

- ID (UUID; primary key) - required
- Grammar Rule ID (UUID; foreign key) - required
- Phrase (string) - required
- Translation (string) - required
- Romanization (string) - nullable

**Course User (Pivot/Progress Table)**

- ID (UUID; primary key) - required
- User ID (UUID; foreign key) - required
- Course ID (UUID; foreign key) - required
- Current Status (enum) - default to not enrolled
- Created At (timestamp)
- Updated At (timestamp)

**Progress Tracking**

- ID (UUID) - required
- User ID (UUID) - required
- Grammar Rule ID (UUID) - required
- Is Completed (boolean) - default to false
- Completed At (timestamps)

**User Examples**

- ID (UUID; primary key) - required
- User ID (UUID; foreign key) - required
- Grammar Rule ID (UUID; foreign key) - required
- Custom Phrase (string) - required
- Translation (string) - required
- Romanization (string) - nullable
- Notes (text) - nullable
- Created At (timestamp)
- Updated At (timestamp)
