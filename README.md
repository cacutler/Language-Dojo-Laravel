# Lanaguage Dojo

This is a full-stack web-application to help people learn different languages like Korean, Japanese, Chinese, Spanish, and English through the use of different methods and strategies, such as vocabulary, grammar rules, alphabets, and examples using quotes from various sources of entertainment.

## Features

- Allow users to create an account and sign in
- Allow users to choose what languages to learn
- Allow users to track progress
- Allow users to add their own examples
- Allow admin users to add new language courses as well as see and edit existing courses

## Database Design

**Users**

- ID
- Name
- Username
- Email
- Phone Number
- Password
- Native Language
- Is Admin
- Created At
- Updated At

**Languages**

- ID
- Name
- Code

**Courses**

- ID
- Language ID
- Title
- Description
- Created At
- Updated At

**Grammar Rules**

- ID
- Course ID
- Title
- Explanation
- Difficulty Level
- Created At
- Updated At

**System Examples**

- ID
- Grammar Rule ID
- Phrase
- Translation
- Romanization

**Course User (Pivot/Progress Table)**

- ID
- User ID
- Course ID
- Current Status
- Created At
- Updated At

**Progress Tracking**

- ID
- User ID
- Grammar Rule ID
- Is Completed
- Completed At

**User Examples**

- ID
- User ID
- Grammar Rule ID
- Custom Phrase
- Translation
- Notes
- Created At
- Updated At
