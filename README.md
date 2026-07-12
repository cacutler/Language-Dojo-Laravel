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
- Primary Language
- Courses (Many to Many where a user can have many courses and a course can have many users)

**Language Courses**

- ID
- Title
- Grammar Rules (One to Many where a language has many grammar rules but a grammar rule only belongs to one language)
- Language Examples (One to Many where a language can have many examples but an example is primarily for one language course)

**Course Progress**

- ID
- User ID
- Course ID
- Progress

**User Examples**

- ID
- User ID
- Example
