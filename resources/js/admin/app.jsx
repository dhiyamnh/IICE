import * as React from 'react'
import { CssBaseline, Box, Typography } from '@mui/material'

export default function App() {
  return (
    <>
      <CssBaseline />
      <Box p={3}>
        <Typography variant="h4">Admin Dashboard</Typography>
        <Typography>React + MUI is mounted. Next: paste in Base components.</Typography>
      </Box>
    </>
  )
}
