# Architecture Decision Record (ADR) Template

Save as: /docs/02-decisions/XXX-decision-name.md
Number sequentially: 001, 002, 003, etc.

## ADR-XXX: [Decision Title]

Date: [DD-MM-YYYY]
Status: [Proposed | Accepted | Deprecated | Superseded]
Deciders: [Your Name]

### Context

What is the issue we're trying to solve? What are the constraints?

<!--
Example:
"We need to choose a database for storing blog posts, users, and tags.
The database must be free or cheap, easy to learn, and suitable for
a read-heavy blog with potential for future scaling."
-->

[DESCRIBE THE PROBLEM AND CONSTRAINTS HERE]

### Decision

What did you decide? State it clearly in one sentence.

<!--
Example:
"We will use PostgreSQL as our database."
-->

[STATE YOUR DECISION HERE]

### Reasoning

Why did you make this choice? What are the benefits?

<!--
Example:
- PostgreSQL is excellent for relational data (posts, users, tags)
- Has strong ACID guarantees for data integrity
- Free and open source with large community
- Available on all major cloud providers
- I want to learn SQL properly
- Good performance for read-heavy workloads
-->

Benefits:

[Benefit 1]
[Benefit 2]
[Benefit 3]

Why this over alternatives:

[Reason 1]
[Reason 2]

### Consequences

What are the trade-offs? What will this decision require?

<!--
Example:
Positive:
- Strong data consistency
- Can use complex queries and joins
- Lots of learning resources available

Negative:
- Need to learn SQL and migrations
- Schema changes require planning
- More complex than a document database

Neutral:
- Need to set up and maintain database server
- Will need backups and monitoring
-->

Positive Consequences:

[Positive 1]
[Positive 2]

Negative Consequences:

[Negative 1]
[Negative 2]

Neutral/Other:

[Other consideration 1]
[Other consideration 2]

### Alternatives Considered

What other options did you evaluate?

<!--
Example:

#### MongoDB
- Pros: Easier for beginners, flexible schema, JSON documents
- Cons: Less structure, harder to ensure data integrity
- Why rejected: Blog data is highly relational

#### MySQL
- Pros: Similar to PostgreSQL, widely used
- Cons: Less advanced features than PostgreSQL
- Why rejected: PostgreSQL has better JSON support for future needs

#### SQLite
- Pros: Zero configuration, file-based
- Cons: Not suitable for production servers with multiple connections
- Why rejected: Need proper database server for deployment
-->

Alternative 1: [Name]

Pros:
Cons:
Why rejected:

Alternative 2: [Name]

Pros:
Cons:
Why rejected:

### Implementation Notes

How will you implement this decision? Any specific steps?

<!--
Example:
- Install PostgreSQL locally for development
- Create database schema (see database-schema.md)
- Use pg library for Node.js
- Set up connection pooling
- Configure environment variables for connection string
- Plan migration strategy for schema changes
-->

Steps:

[Step 1]
[Step 2]
[Step 3]

Resources/References:

[Link to documentation]
[Tutorial followed]
[Article that helped]

### Review Date

When should we revisit this decision?

<!--
Example: "After Phase 1 deployment (3 months)"
-->

[DATE OR MILESTONE]

### Related Decisions

Links to related ADRs or documents:

<!--
Example:
- ADR-002: Choice of ORM vs raw SQL
- See database-schema.md for table design
-->

[Link 1]
[Link 2]

Last Updated: [Date]
