## ADR-001: Use Next.js as Full-Stack Framework

Date: 04-02-2026
Status: Accepted
Deciders: Samudra de Silva

### Context

I need to choose a technology stack for building a blog from scratch. The goals are:

- Learn full-stack development
- Build both frontend and backend
- Understand how all pieces connect
- Deploy to production
- Minimize complexity while maximizing learning

### Key constraints:

- I know JavaScript/React basics
- I want to avoid tutorial hell by building something real
- I have limited budget for hosting
- I want something that scales as I learn

### Decision

We will use Next.js 16.1.6 with App Router as our full-stack framework.
This means:

- Frontend: Next.js React components
- Backend: Next.js API routes
- One codebase, one framework
- TypeScript support (will add in Phase 2)

### Reasoning

#### Why Next.js specifically:

- Full-stack in one framework
  - Don't need separate frontend and backend repos
  - API routes built-in (no Express.js needed)
  - Easier to reason about when learning

- Server-side rendering (SSR)
  - Blog posts render on server → better SEO
  - Faster initial page loads
  - Learn modern React patterns (Server Components)

- Developer experience
  - Hot reload during development
  - Built-in routing (file-based)
  - Great documentation and community
  - Many tutorials specific to blogs

- Production-ready
  - Used by major companies
  - Battle-tested deployment options
  - Good performance out of the box

- Career relevance
  - Next.js is in high demand
  - Understanding SSR is valuable
  - Can discuss this in interviews

#### Why over alternatives:

- More structured than vanilla React
- Simpler than separate frontend + backend
- Better for blogs than SPA frameworks
- Free/cheap deployment options available

### Consequences

- Positive Consequences:
  - Learn modern full-stack development
  - One framework to master instead of multiple
  - Great for building portfolio project
  - Can deploy to Vercel (free) or VPS (cheap)
  - Built-in optimizations (image optimization, code splitting)
  - Strong TypeScript support for future

- Negative Consequences:
  - Need to learn Next.js-specific concepts (SSR, hydration, etc.)
  - Might be overkill for a simple blog initially
  - Server costs if not using Vercel (though VPS is cheap)

- Neutral/Other:
  - Locked into React ecosystem (but that's okay - React is popular)
  - Need to learn Next.js conventions and best practices
  - Will need to understand deployment (good learning opportunity)

### Alternatives Considered

Alternative 1: Create React App + Express.js

- Pros:
  - Separate concerns (frontend/backend clear)
  - Each piece simpler to understand
  - More "traditional" architecture

- Cons:
  - Two separate codebases to manage
  - Need to deploy two applications
  - More complex routing between them
  - No SSR (bad for blog SEO)

Why rejected: Too much overhead for solo developer learning. Next.js gives us both in one package.

Alternative 2: Vanilla React (SPA) + Node.js/Express backend

- Pros:
  - Full control over everything
  - Learn React and Node separately
  - Common pattern in industry

- Cons:
  - No SSR (bad for SEO)
  - Need to set up everything manually
  - Client-side routing issues
  - More deployment complexity

Why rejected: More work, worse SEO, and Next.js gives us this anyway with better DX.

Alternative 3: WordPress

- Pros:
  - Zero coding for basic features
  - Massive plugin ecosystem
  - Easy for non-technical users

- Cons:
  - Defeats the purpose of learning to code
  - PHP ecosystem (I want JavaScript)
  - Heavy and slow
  - Security concerns with plugins

Why rejected: I want to learn development, not install themes. Complete non-starter for learning goals.

### Resources to study:

- Next.js official docs: https://nextjs.org/docs
- Next.js Learn course (free): https://nextjs.org/learn
- Real-world Next.js blogs on GitHub (study their structure)

### Related Decisions

Status Updates
2024-02-04: Decision made, project initialized

Last Updated: 2024-02-04
Next Review: After Phase 1 MVP completion
